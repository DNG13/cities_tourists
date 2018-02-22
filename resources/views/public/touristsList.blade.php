@extends('layouts.app')

@section('title', 'Список туристів')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin: 50px">
            <h4><strong>Список туристів з переліком відвіданих міст</strong></h4>

            @if(!count($tourists)==0)

                <div class="col-md-12" style="display: inline-block; margin: 10px;">
                    <form action="{{url('/')}}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Пошук ( ім'я, прізвище )" >
                            <span class="input-group-addon btn btn-default">
                                <button type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                                <button type="submit">зкинути</button>
                            </span>
                        </div>
                    </form>
                </div>
                <table class="table table-striped" border="1">
                    <thead>
                    <tr>
                        <th><p>Ім'я</p> <a href="{{ $sort['first_name']['link'] }}"><i class="fa {{ $sort['first_name']['icon'] }}" aria-hidden="true"></i></a></th>
                        <th><p>Прізвище</p> <a href="{{ $sort['last_name']['link'] }}"><i class="fa {{ $sort['last_name']['icon'] }}" aria-hidden="true"></i></a></th>
                        <th><p>Відвідані міста</p></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tourists as $tourist)
                        <tr class="odd">
                            <td>{{ $tourist->first_name }}</td>
                            <td>{{ $tourist->last_name }}</td>
                            <td>{{ $tourist->cities }}</td>
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