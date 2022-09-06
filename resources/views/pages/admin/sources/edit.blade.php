@extends('layouts.admin')

@section('title')
    @parent - Источники новостей - Изменение
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-9 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Изменить источник</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post" action="{{route('admin.sources.update',['source'=>$source])}}">
                            @csrf
                            @method('put')
                            <div class="col-md-12">
                                <label for="name" class="form-label">Название</label>
                                <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" placeholder="Название"
                                       value="{{old('name')?:$source->name}}">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Описание</label>
                                <input type="text" class="form-control @error('description') border-danger @enderror" id="description" name="description" placeholder="Описание"
                                       value="{{old('description')?:$source->description}}">
                                @error('descripton')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="url" class="form-label">Ccылка</label>
                                <input type="text" class="form-control @error('url') border-danger @enderror" id="url" name="url" placeholder="Ссылка"
                                       value="{{old('url')?:$source->url}}">
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
