@extends('layouts.default')

@section('content')
    <style>
        tr:nth-child(even) {background-color: #f2f2f2;}

        th, td {
            padding: 15px;
            text-align: center;
        }
    </style>
    <div class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="row" method="GET" action="{{ route('index') }}">
                                <input type="hidden" name="owner" value="{{ $owner }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-1">Procurar</label>
                                        <input type="text" name="search" class="form-control" value="{{$filter['search']}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1">Arquivado?</label>
                                        <select class="form-control" name="archived">
                                            <option value="no_filter" {{ $filter['archived'] == 'no_filter' ? 'selected' : '' }}>Sem filtro</option>
                                            <option value="yes" {{ $filter['archived'] == 'yes' ? 'selected' : '' }}>Sim</option>
                                            <option value="no" {{ $filter['archived'] == 'no' ? 'selected' : '' }}>Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1">Fork?</label>
                                        <select class="form-control" name="fork">
                                            <option value="no_filter" {{ $filter['fork'] == 'no_filter' ? 'selected' : '' }}>Sem filtro</option>
                                            <option value="yes" {{ $filter['fork'] == 'yes' ? 'selected' : '' }}>Sim</option>
                                            <option value="no" {{ $filter['fork'] == 'no' ? 'selected' : '' }}>Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1">Desabilitado?</label>
                                        <select class="form-control" name="disabled">
                                            <option value="no_filter" {{ $filter['disabled'] == 'no_filter' ? 'selected' : '' }}>Sem filtro</option>
                                            <option value="yes" {{ $filter['disabled'] == 'yes' ? 'selected' : '' }}>Sim</option>
                                            <option value="no" {{ $filter['disabled'] == 'no' ? 'selected' : '' }}>Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success" style="width: 100%; margin-top: 27px; border-radius: 20px;">Filtrar</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('index') }}?owner={{$owner}}" class="btn btn-info" style="width: 100%; margin-top: 27px; border-radius: 20px;">Limpar filtro</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-right overflow-auto">
                                <form style="margin-left: 5px;">
                                    Ordenação:
                                    <select id="order">
                                        <option value="1" @if($order == 1) selected @endif >Nome ordem alfabética</option>
                                        <option value="2" @if($order == 2) selected @endif >Nome ordem alfabética inversa</option>
                                        <option value="3" @if($order == 3) selected @endif >Último commit ordem cronológica</option>
                                        <option value="4" @if($order == 4) selected @endif >Último commit ordem cronológica inversa</option>
                                    </select>
                                </form>
                                <table class="w-100">
                                    <tr class="mb-5">
                                        <th class="font-weight-bold">Repositório</th>
                                        <th class="font-weight-bold">Descrição</th>
                                        <th class="font-weight-bold">URL</th>
                                        <th class="font-weight-bold">Arquivado?</th>
                                        <th class="font-weight-bold">Fork?</th>
                                        <th class="font-weight-bold">Visibilidade</th>
                                        <th class="font-weight-bold">Linguagem</th>
                                        <th class="font-weight-bold">Branch Principal</th>
                                        <th class="font-weight-bold">Commits</th>
                                        <th class="font-weight-bold">Último Commit</th>
                                    </tr>
                                    @foreach($repos as $repo)
                                        <tr>
                                            <td>{{ $repo->name }}</td>
                                            <td>{{ str()->limit($repo->description, 50) }}</td>
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
                                <div class="float-right mt-3">
                                    {{ $repos->appends(request()->all())->render("pagination::bootstrap-4") }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('order').onchange = function () {
            window.location = "{!! $repos->url(1) !!}&order=" + this.value;
        };
    </script>
@endsection
