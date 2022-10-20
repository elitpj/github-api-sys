<?php

namespace App\Repositories;

use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Session;


class GitHubAPI
{

    public static function getRepositories($owner) {
        $url = 'https://api.github.com/users/'.$owner.'/repos';

        $response = Http::get($url);

        return ['data' => json_decode($response->body()), 'error' => json_decode($response->failed())];
    }

    public static function getCommits($owner, $repository) {
        $url = 'https://api.github.com/repos/'.$owner.'/'.$repository.'/commits';

        $response = Http::get($url);

        return ['data' => json_decode($response->body()), 'error' => json_decode($response->failed())];
    }
}
