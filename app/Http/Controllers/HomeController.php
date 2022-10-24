<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use App\Repositories\GitHubAPI;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home() {
        return view('home');
    }

    public function index(Request $request) {
        $owner = $request->owner;
        $title = 'Repositórios - ' . $owner;
        $repositories = GitHubAPI::getRepositories($request->owner);

        $data = $repositories['data'];

        if($repositories['error']) {
            return redirect()->back()->withErrors($repositories['data']->message);
        }
        if($request->get('first_load')) {
            $old_repos = Repository::where('owner', $request->owner)->delete();
            foreach ($data as $repo) {
                $commits = GitHubAPI::getCommits($request->owner, $repo->name);

                $new_repo = Repository::create([
                    'owner' => $request->owner,
                    'name' => $repo->name,
                    'description' => $repo->description,
                    'url' => $repo->html_url,
                    'is_archived' => ($repo->archived == 'true') ? true : false,
                    'is_fork' => ($repo->fork == 'true') ? true : false,
                    'is_disabled' => ($repo->disabled == 'true') ? true : false,
                    'visibility' => $repo->visibility,
                    'language' => $repo->language,
                    'default_branch' => $repo->default_branch,
                    'last_commit' => Carbon::create($repo->pushed_at),
                    'number_of_commits' => (!$commits['error']) ? count($commits['data']) : 0
                ]);
            }
        }

        $filter['search'] = $request->get('search') ? $request->get('search') : null;
        $filter['archived'] = $request->get('archived') ? $request->get('archived') : 'no_filter';
        $filter['fork'] = $request->get('fork') ? $request->get('fork') : 'no_filter';
        $filter['disabled'] = $request->get('disabled') ? $request->get('disabled') : 'no_filter';

        $order = $request->get('order') ? $request->get('order') : 1;

        $repos = $this->filterRepositories($filter, $owner, $order);

        return view('index', compact('title', 'repos', 'owner', 'filter', 'order'));
    }

    private function filterRepositories($filter, $owner, $order) {
        $repos = Repository::where('owner', $owner);

        if($filter['search']) {
            $repos->where('name', 'LIKE', '%'.$filter['search'].'%');
        }

        if($filter['archived'] != 'no_filter') {
            $tmp = $filter['archived'] == 'yes' ? 1 : 0;
            $repos->where('is_archived', $tmp);
        }

        if($filter['fork'] != 'no_filter') {
            $tmp = $filter['fork'] == 'yes' ? 1 : 0;
            $repos->where('is_fork', $tmp);
        }

        if($filter['disabled'] != 'no_filter') {
            $tmp = $filter['disabled'] == 'yes' ? 1 : 0;
            $repos->where('is_disabled', $tmp);
        }

        if($order) {
            switch($order) {
                case 1:
                    $repos->orderBy('name', 'ASC');
                    break;
                case 2:
                    $repos->orderBy('name', 'DESC');
                    break;
                case 3:
                    $repos->orderBy('last_commit', 'ASC');
                    break;
                case 4:
                    $repos->orderBy('last_commit', 'DESC');
                    break;
                default:
                    $repos->orderBy('name', 'ASC');
            }
        }

        return $repos->paginate(10);
    }
}
