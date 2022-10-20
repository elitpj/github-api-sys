<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>GitHub API</title>
    <link href="{{ asset('theme-assets/css/style.css') }}" rel="stylesheet">

</head>
<style>
    .form {
        padding: 50px 50px;
    }
    .container-full {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
</style>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-full h-100">
            <div class="row justify-content-center h-100 align-items-center  ml-5 mr-5">
                <div class="authincation-content" style="border-radius: 15px;">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="form">
                                <table class="w-100">
                                    <tr class="mb-5">
                                        <th class="text-white">Repositório</th>
                                        <th class="text-white">Descrição</th>
                                        <th class="text-white">URL</th>
                                        <th class="text-white">Está arquivado?</th>
                                        <th class="text-white">É um fork?</th>
                                        <th class="text-white">Visibilidade</th>
                                        <th class="text-white">Linguagem</th>
                                        <th class="text-white">Branch Principal</th>
                                        <th class="text-white">Commits</th>
                                        <th class="text-white">Último Commit</th>
                                    </tr>
                                    @foreach($repos as $repo)
                                    <tr>
                                        <td>{{ $repo->name }}</td>
                                        <td>{{ $repo->description }}</td>
                                        <td>{{ $repo->url }}</td>
                                        <td>{{ $repo->is_archived }}</td>
                                        <td>{{ $repo->is_fork }}</td>
                                        <td>{{ $repo->visibility }}</td>
                                        <td>{{ $repo->language }}</td>
                                        <td>{{ $repo->default_branch }}</td>
                                        <td>{{ $repo->number_of_commits }}</td>
                                        <td>{{ $repo->last_commit }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('theme-assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('theme-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/deznav-init.js') }}"></script>

</body>

</html>
