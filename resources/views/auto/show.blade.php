@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Autoservisas</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        {{$aServices->name}}
            <div class="controls">
                <a class="btn btn-outline-success m-2" href="{{route('ac_edit', $aServices)}}">Edit</a>
                <form class="delete" action="{{route('ac_delete', $aServices)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger m-2">Destroy it!</button>
                </form>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
