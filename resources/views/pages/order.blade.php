@extends('layouts.main')

@section('title')
    @parent - Заказ на данные
@endsection

@section('content')
    <h1>Заказ на данные</h1>
    @include('includes.messages')
    <div class="d-flex justify-content-center">
        <div class="card col-lg-6">
            <div class="card-body">
                <h5 class="card-title">Создать заказ</h5>

                <!-- Multi Columns Form -->
                <form class="row g-3" method="post" action="{{route('order.store')}}">
                    @csrf
                    <div class="col-md-12 ">
                        <label for="fio" class="form-label">Ваше Имя, Фамилия</label>
                        <input type="text" class="form-control @error('fio') border-danger @enderror"
                               id="fio" name="fio" value="{{old('fio')}}" placeholder="Имя Фамилия">
                        @error('fio')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control @error('email') border-danger @enderror"
                               id="email" name="email" value="{{old('email')}}" placeholder="user@mail.ru">
                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="phone" class="form-label">Номер телефона</label>
                        <input type="phone" class="form-control @error('phone') border-danger @enderror"
                               id="phone" name="phone" value="{{old('phone')}}" placeholder="+79991112233">
                        @error('phone')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="link" class="form-label">Ссылка на ресурс</label>
                        <input type="text" class="form-control @error('link') border-danger @enderror"
                               id="link" name="link" value="{{old('link')}}" placeholder="https://newsbox.net">
                        @error('link')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Multi Columns Form -->
            </div>
        </div>
    </div>

@endsection
