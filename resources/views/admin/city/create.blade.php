@extends('layouts.app')

@section('title', 'Місто(створити)')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Місто(створити)</div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('admin/city')}}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 control-label">Назва міста</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="country" class="col-md-4 control-label">Країна</label>

                                    <div class="col-md-8">
                                        <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="file" class="col-md-4 control-label">Оберіть файл/файли (PNG,JPG,JPEG)</label>

                                    <div class="col-md-8">
                                        <input type="file"  multiple name="file[]" accept=".jpeg, .jpg, .png" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-info">
                                           Додати
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
