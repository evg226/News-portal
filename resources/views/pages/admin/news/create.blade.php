@extends('layouts.admin')

@section('title')
    @parent - Список новостей - Новая
@endsection

@section('content')

    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-9 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Добавить новость</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post" action="{{route('admin.news.store')}}">
                            @csrf
                            <div class="col-md-8">
                                <label for="title" class="form-label">Название</label>
                                <input type="text" class="form-control @error('title') border-danger @enderror"
                                       id="title" name="title" value="{{old('title')}}">
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="author" class="form-label">Автор</label>
                                <input type="text" class="form-control @error('author') border-danger @enderror"
                                       id="author" name="author" value="{{old('author')}}">
                                @error('author')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Описание </label>
                                <input type="text" class="form-control @error('description') border-danger @enderror"
                                       id="description" name="description" value="{{old('description')}}">
                                @error('description')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Фото</label>
                                <input type="text" class="form-control @error('image') border-danger @enderror"
                                       id="image" name="image" value="{{old('image')}}">
                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Категория</label>
                                <select id="category" class="form-select">
                                    <option selected="">Category 1</option>
                                    <option selected="">Category 2</option>
                                    <option selected="">Category 3</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="content" class="form-label">Контент</label>
                                <textarea class="form-control @error('content') border-danger @enderror"
                                          id="content" name="content" rows="15"
                                          style="font-size: 0.8rem" >{!! old('content') !!}</textarea>
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
        </div>
    </section>

@endsection
