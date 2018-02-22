@extends('layouts.app')

@section('title', 'Турист(перегляд)')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Турист(перегляд)</div>
                        <div class="card-body">
                            <div class="form-horizontal">
                                <div  class="form-group row">
                                    <label for="first_name" class="col-md-4">Ім'я</label>
                                    <div class="col-md-8">
                                        <p id="first_name" >{{ $tourist->first_name }}</p>
                                    </div>
                                </div>

                                <div  class="form-group row">
                                    <label for="surname" class="col-md-4">Прізвище</label>
                                    <div class="col-md-8">
                                        <p id="last_name">{{ $tourist->last_name }}</p>
                                    </div>
                                </div>

                                <div  class="form-group row">
                                    <label for="country" class="col-md-4">Дата народження</label>
                                    <div class="col-md-8">
                                        <p id="country">{{ $tourist->birthday }}</p>
                                    </div>
                                </div>

                                <div  class="form-group row">
                                    <div class="col-md-12">
                                        <a href="/admin/tourist/{{ $tourist->id }}/edit" class="btn btn-info" role="button">Редагувати</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
