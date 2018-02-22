@extends('layouts.app')

@section('title', 'Всі міста')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin: 50px">
            <h4><strong>Список міст</strong></h4>
            <div class="col-md-12" style="display: inline-block; margin: 10px;">
                <form action="{{url('/cities')}}" method="GET">
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
                <div style="display: none; border: solid 1px grey; margin-bottom: 3px;" id="showme" class="col-md-12"></div>
                <table class="table table-striped" border="1">
                    <thead>
                        <tr>
                            <th><p>Назва міста</p> <a href="{{ $sort['name']['link'] }}"><i class="fa {{ $sort['name']['icon'] }}" aria-hidden="true"></i></a></th>
                            <th><p>Країна</p> <a href="{{ $sort['country']['link'] }}"><i class="fa {{ $sort['country']['icon'] }}" aria-hidden="true"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                            <tr class="odd city-row" onclick="window.scrollTo(0, 0)" style="cursor: pointer;" id="show{{$city->id}}" data-cityid="{{$city->id}}" title="Написніть для перегляду детальної інформації">
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->country }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4>У вас немає міст.</h4>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".city-row").on('click', function(){
                $('#showme').show();
                $('#showme').load('/city/'+ $(this).data('cityid'));
            });
        });
    </script>
@endsection