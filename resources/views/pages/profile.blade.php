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
                        <div class="row row-cols-2">
                            <div>id</div>
                            <div>{{auth()->user()->id}}</div>
                            <div>Пользователь</div>
                            <div>{{auth()->user()->name}}</div>
                            <div>E-mail</div>
                            <div>{{auth()->user()->email}}</div>
                            <div>Уровень прав</div>
                            <div>{{auth()->user()->is_admin?'Администратор':'Пользователь'}}</div>
                        </div>
                        @if(auth()->user()->is_admin)
                            <div class="text-center my-3">
                                <a class="btn btn-outline-secondary" href="{{route('admin.index')}}">Админ. панель
                                    >></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
