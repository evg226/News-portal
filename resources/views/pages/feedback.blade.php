@extends('layouts.main')

@section('title')
    @parent - Обратная связь
@endsection

@section('content')
    <h1>Обратная связь</h1>
    <div class="d-flex justify-content-center">
        <div class="card col-lg-6">
            <div class="card-body">
                <h5 class="card-title">Создать отзыв</h5>

                <!-- Multi Columns Form -->
                <form class="row g-3" method="post" action="{{route('feedback.store')}}">
                    @csrf
                    <div class="col-md-6 ">
                        <label for="fio" class="form-label">Ваше Имя, Фамилия</label>
                        <input type="text" class="form-control @error('fio') border-danger @enderror"
                               id="fio" name="fio" value="{{old('fio')}}" placeholder="Имя Фамилия">
                        @error('fio')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="content" class="form-label">Текст отзыва</label>
                        <textarea class="form-control @error('content') border-danger @enderror"
                                  id="content" name="content" rows="15"
                                  style="font-size: 0.8rem">{!! old('content') !!}</textarea>
                        @error('content')
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
