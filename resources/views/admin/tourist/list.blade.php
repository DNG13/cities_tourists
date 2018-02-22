@extends('layouts.app')

@section('title', 'Список туристів')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin: 50px">
            <h4><strong>Список туристів з кількістю відвіданих міст</strong></h4>

            @if(!count($tourists)==0)
                <table class="table table-striped" border="1">
                    <thead>
                    <tr>
                        <th><p>Ім'я</p></th>
                        <th><p>Прізвище</p></th>
                        <th><p>Кількість відвіданих міст</p></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tourists as $tourist)
                        <tr class="odd">
                            <td>{{ $tourist->first_name }}</td>
                            <td>{{ $tourist->last_name }}</td>
                            <td>{{ $tourist ->number }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h4>У вас немає туристів.</h4>
            @endif
        </div>
    </div>
@endsection