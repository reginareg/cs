@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Visos paslaugos</h1>
                        <div> Rušiuoti:
                            <a href="{{route('uc_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('uc_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('uc_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($users as $user)
                                <li class="list-group-item">
                                    <div class="service-bin">
                                        <div class="service-box">
                                            <h3>{{$user->name}}</h3>
                                            <h2>{{$user->email}}</h2>
                                        </div>
                                        <div class="controls">
                                            <a class="btn btn-outline-primary m-2" href="{{route('uc_show', $user)}}">Show</a>
                                            <form  action="{{route('uc_delete', $user)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2">Kill</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No user no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection