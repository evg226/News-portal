@extends('layouts.admin')

@section('title')
    @parent - Пользователи - Изменение
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-9 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Изменить пользователя</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post" action="{{route('admin.users.update',['user'=>$user])}}">
                            @csrf
                            @method('put')
                            <div class="col-md-12">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" class="form-control @error('name') border-danger @enderror" id="name"
                                       name="name" placeholder="Имя"
                                       value="{{old('name')?:$user->name}}">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control @error('email') border-danger @enderror"
                                       id="email" name="email" placeholder="user@mailserv.com"
                                       value="{{old('email')?:$user->email}}">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input type="checkbox"
                                           class="form-check-input"
                                           @error('is_admin') border-danger @enderror
                                           id="is_admin" name="is_admin"
                                        @checked(old('is_admin')||$user->is_admin)
                                    >
                                    <label class="form-check-label" for="is_admin" class="form-label">Админ права</label>
                                    @error('is_admin')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                <button type="reset" class="btn btn-secondary">Очистить</button>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
