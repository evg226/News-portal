@extends('layouts.admin')

@section('title')
    @parent - Источники новостей - Новая
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-9 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Добавить источник</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post" action="{{route('admin.sources.store')}}">
                            @csrf
                            <div class="col-md-12">
                                <label for="name" class="form-label">Название</label>
                                <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" placeholder="Название"
                                       value="{{old('name')}}">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Автор</label>
                                <input type="text" class="form-control @error('description') border-danger @enderror" id="description" name="description" placeholder="Описание"
                                       value="{{old('description')}}">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="url" class="form-label">Ccылка</label>
                                <input type="text" class="form-control @error('url') border-danger @enderror" id="url" name="url" placeholder="Ссылка"
                                       value="{{old('url')}}">
                                @error('url')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
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
