<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>GitHub API</title>
    <link href="{{ asset('theme-assets/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content" style="border-radius: 15px;">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4 mt-2" style="color: #fff;">Digite o username do GitHub</h4>
                                    <form method="GET" action="{{ route('index') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group mb-5">
                                            <input type="text" name="owner" class="form-control" value="{{ old('owner') }}">
                                        </div>
                                        @if($errors->any())
                                            <div class="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li style="color: #ff0000;">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #77D62D; font-weight: 500; border: none;">Acessar</button>
                                        </div>
                                    </form>
                                </div>
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
