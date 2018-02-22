@extends('layouts.app')

@section('title', 'Список міст')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin: 50px">
            <h4><strong>Список міст з прізвищами/іменами туристів, що їх відвідали</strong></h4>
            @if(!count($cities)==0)
                <table class="table table-striped" border="1">
                    <thead>
                    <tr>
                        <th><p>Назва міста</p></th>
                        <th><p>Країна</p></th>
                        <th><p>Прізвища/Імена туристів</p></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr class="odd">
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->country }}</td>
                            <td>{{ $city->tourists  }}</td>
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