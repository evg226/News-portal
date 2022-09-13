@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Личный кабинет</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h6 class="my-3">{{auth()->user()->name}}, добро пожаловать!</h6>
                        <div class="row">
                            <div class="col-sm-4" style="max-width: 200px">
                                <img class="rounded-circle w-100" src="{{auth()->user()->avatar}}">
                            </div>
                            <div class="col-sm-8 d-flex flex-column">
                                <div class="my-2"><b>id:</b> {{auth()->user()->id}}</div>
                                <div class="my-2"><b>Пользователь:</b> {{auth()->user()->name}}</div>
                                <div class="my-2"><b>E-mail:</b> {{auth()->user()->email}}</div>
                                <div class="my-2"><b>Уровень прав:</b> {{auth()->user()->is_admin?'Администратор':'Пользователь'}}</div>
                                @if(auth()->user()->is_admin)
                                    <div class="">
                                        <a class="btn btn-outline-secondary py-1 my-2" href="{{route('admin.index')}}">Админ. панель</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
