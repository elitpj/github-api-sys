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
//        $repositories = GitHubAPI::getRepositories($request->owner);
//
//        $data = $repositories['data'];
//
//        if($repositories['error']) {
//            return redirect()->back()->withErrors($repositories['data']->message);
//        }
//
//        $old_repos = Repository::where('owner', $request->owner)->delete();
//        foreach ($data as $repo) {
//            $commits = GitHubAPI::getCommits($request->owner, $repo->name);
//
//            $new_repo = Repository::create([
//                'owner' => $request->owner,
//                'name' => $repo->name,
//                'description' => $repo->description,
//                'url' => $repo->html_url,
//                'is_archived' => ($repo->archived == 'true') ? true : false,
//                'is_fork' => ($repo->fork == 'true') ? true : false,
//                'visibility' => $repo->visibility,
//                'language' => $repo->language,
//                'default_branch' => $repo->default_branch,
//                'last_commit' => Carbon::create($repo->pushed_at),
//                'number_of_commits' => (!$commits['error']) ? count($commits['data']) : 0
//            ]);
//        }

        $repos = Repository::where('owner', $request->owner)->get();

        return view('index', compact('repos'));
    }
}
