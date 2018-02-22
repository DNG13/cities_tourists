@extends('layouts.app')

@section('title', 'Всі міста')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin: 50px">
            <h4><strong>Всі міста</strong></h4>

            <div>
                <a class="btn btn-info btn pull-right" style="margin-bottom: 5px" href="{{ url('/admin/city/create')}}">Додати місто</a>
            </div>
            <div class="col-md-12" style="display: inline-block; margin: 10px;">
                <form action="{{url('/admin/city')}}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Пошук ( місто, країна )" >
                        <span class="input-group-addon btn btn-default">
                                <button type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                                <button type="submit">зкинути</button>
                            </span>
                    </div>
                </form>
            </div>
            @if(!count($cities)==0)
                <table class="table table-striped" border="1">
                    <thead>
                        <tr>
                            <th><p>ID</p> <a href="/{{ $sort['id']['link'] }}"><i class="fa {{ $sort['id']['icon'] }}" aria-hidden="true"></i></a></th>
                            <th><p>Назва міста</p> <a href="/{{ $sort['name']['link'] }}"><i class="fa {{ $sort['name']['icon'] }}" aria-hidden="true"></i></a></th>
                            <th><p>Країна</p><a href="/{{ $sort['country']['link'] }}"><i class="fa {{ $sort['country']['icon'] }}" aria-hidden="true"></i></a></th>
                            <th><p>Час створення</p><a href="/{{ $sort['created_at']['link'] }}"><i class="fa {{ $sort['created_at']['icon'] }}" aria-hidden="true"></i></a></th>
                            <th><p>Час оновлення</p><a href="/{{ $sort['updated_at']['link'] }}"><i class="fa {{ $sort['updated_at']['icon'] }}" aria-hidden="true"></i></a></th>
                            <th>Дія</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                            <tr class="odd">
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->country }}</td>
                                <td>{{ date('j/n/Y H:i', strtotime($city->created_at )) }}</td>
                                <td>{{ date('j/n/Y H:i', strtotime($city->updated_at )) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="/admin/city/{{ $city->id }}" title="Перегляд" >
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-info btn-sm" href="/admin/city/{{ $city->id }}/edit" title="Редагувати">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <form action="/admin/city/{{ $city->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-warning btn-sm" title="Видалити">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4>У вас немає міст.</h4>
            @endif
        </div>
    </div>
@endsection