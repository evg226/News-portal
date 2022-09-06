@extends('layouts.admin')

@section('title')
    @parent - Категории - Редактирование
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-9 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Редактировать категорию</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post"
                              action="{{route('admin.categories.update',['category'=>$category])}}">
                            @csrf
                            @method('put')
                            <div class="col-md-12">
                                <label for="title" class="form-label">Название</label>
                                <input type="text" class="form-control @error('title') border-danger @enderror"
                                       id="title" name="title" placeholder="Название"
                                       value="{{old('title')?:$category->title}}">
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="author" class="form-label">Автор</label>
                                <input type="text" class="form-control @error('author') border-danger @enderror"
                                       id="author" name="author" placeholder="Автор"
                                       value="{{old('author')?:$category->author}}">
                                @error('author')
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
