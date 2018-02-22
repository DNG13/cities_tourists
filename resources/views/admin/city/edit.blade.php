@extends('layouts.app')

@section('title', 'Місто(редагувати)')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Місто(редагувати)</div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ route('city.update', $city->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 control-label">Назва міста</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $city->name }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="country" class="col-md-4 control-label">Країна</label>

                                    <div class="col-md-8">
                                        <input id="country" type="text" class="form-control" name="country" value="{{ $city->country }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="file" class="col-md-4 control-label">Оберіть файл/файли (PNG,JPG,JPEG)</label>

                                    <div class="col-md-8">
                                        <input type="file"  multiple name="file[]" accept=".jpeg, .jpg, .png" >
                                    </div>
                                </div>

                                @if(!empty($links))
                                    @foreach($links as $key => $image)
                                        <div style="margin: 10px">
                                            <img src="/uploads/{{ $image }}" />
                                            <a title="Удалить" href="/admin/image/delete?id={{ $city->id }}&key={{ $key }}&link={{ $image }}">
                                                <div class="btn btn-default">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="form-group row">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-info">
                                            Зберегти
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
