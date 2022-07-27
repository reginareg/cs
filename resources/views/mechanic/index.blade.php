@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Visi mechanikai</h1>
                        <div> Rušiuoti:
                            <a href="{{route('mc_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('mc_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('mc_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($mechanics as $mechanic)
                                <li class="list-group-item">
                                    <div class="mechanic-bin">
                                        <div class="mechanic-box">
                                            <h2>{{$mechanic->name}}</h2>
                                        </div>
                                        <div class="controls">
                                            <a class="btn btn-outline-primary m-2" href="{{route('mc_show', $mechanic->id)}}">Show</a>

                                            <a class="btn btn-outline-success m-2" href="{{route('mc_edit', $mechanic)}}">Edit</a>
                                            <form class="delete" action="{{route('mc_delete', $mechanic)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2">Kill</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No mechanic no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection