@extends('layouts.app')

@section('title', 'Місто(перегляд)')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Місто(перегляд)</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4">Назва міста:</label>
                            <div class="col-md-8">
                                <p id="name" >{{ $city->name }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4">Країна:</label>
                            <div class="col-md-8">
                                <p id="country">{{ $city->country }}</p>
                            </div>
                        </div>

                        @if(!empty($links))
                            @foreach($links as $key => $image)
                                <div class="form-group">
                                    <label for="image" class="col-md-4 control-label"></label>

                                    <div class="col-md-8">
                                        <img src="/uploads/{{ $image }}" />
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div>
                            <div class="col-md-12">
                                <a href="/admin/city/{{ $city->id }}/edit" class="btn btn-info" role="button">Редагувати</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
