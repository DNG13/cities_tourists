@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <ul>
                        <li><a href="{{ url('/admin/city')}}">Міста</a></li>
                        <li><a href="{{ url('/admin/tourist')}}">Туристи</a></li>
                        <li><a href="{{ url('/admin/list/cities')}}">Міста з туристами</a></li>
                        <li><a href="{{ url('/admin/list/tourists')}}">Туристи з кількістю відвіданих міст</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Ви залогінились. І тепер має те доступ до адміністративної частини.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
