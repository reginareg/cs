@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sukurti naują paslaugą</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('pc_store')}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Pavadinimasas</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="deadline" class="col-md-4 col-form-label text-md-end">Trukmė</label>
                                <div class="col-md-6">
                                    <input id="deadline" type="text" class="form-control" name="deadline" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">Kaina</label>
                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price_id" >
                                </div>
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