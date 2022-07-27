@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sukurti naują autoservisą</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('ac_store')}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Pavadinimas</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">telefono Nr.</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">addresas</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="paslauga_id" class="col-md-4 col-form-label text-md-end">Paslauga</label>
                                <select id="paslauga_id" name="paslauga_id" class="form-select form-select-sm">
                                    @foreach($paslaugos as $paslauga)
                                        <option value="{{$paslauga->id}}">{{$paslauga->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <label for="mechanikas_id" class="col-md-4 col-form-label text-md-end">Mechanikas</label>
                                <select id="mechanikas_id" name="mechanikas_id" class="form-select form-select-sm">
                                    @foreach($mechanikai as $mechanikas)
                                        <option value="{{$mechanikas->id}}">{{$mechanikas->name}}</option>
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