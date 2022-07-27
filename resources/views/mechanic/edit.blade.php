@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redaguoti mechaniką</div>

                <div class="card-body">
                    <form method="POST" action="{{route('mc_update', $mechanic)}}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Vardas</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$mechanic->name}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end">Pavardė</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{$mechanic->surname}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">Foto</label>
                            <div class="col-md-6">
                                <input id="photo" type="text" class="form-control" name="photo" value="{{$mechanic->photo}}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="rating_id" class="col-md-4 col-form-label text-md-end">Vertinimas</label>
                            <select id="rating_id" name="rating" class="form-select form-select-sm">
                                @foreach($ratings as $key => $value)
                                <option value="{{$key}}" @if($mechanic->rating == $key) selected
                                    @endif >{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
