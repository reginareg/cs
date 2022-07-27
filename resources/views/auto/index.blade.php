@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Visi autoservisai</h1>
                    <div> Rušiuoti:
                        <a href="{{route('ac_index', ['sort' => 'asc'])}}">A to Z</a>
                        <a href="{{route('ac_index', ['sort' => 'desc'])}}">Z to A</a>
                        <a href="{{route('ac_index')}}">Reset</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($aServices as $aService)
                        <li class="list-group-item">
                            <div class="service-bin">
                                <div class="service-box">
                                    <h2>{{$aService->name}}</h2>
                                </div>
                                <div class="controls">
                                    <a class="btn btn-outline-primary m-2" href="{{route('ac_show', $aService->id)}}">Show</a>

                                    <a class="btn btn-outline-success m-2" href="{{route('ac_edit', $aService)}}">Edit</a>
                                    <form class="delete" action="{{route('ac_delete', $aService)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger m-2">Destroy it!</button>
                                    </form>

                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No SERVICES no life.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
