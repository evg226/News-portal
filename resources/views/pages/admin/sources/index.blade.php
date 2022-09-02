@extends('layouts.admin')

@section('title')
    @parent - Источники новостей
@endsection

@section('content')

    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Редактирование источников</h5>
                    <a href="{{route('admin.sources.create')}}" class="card-title px-2">
                        <i class="bi bi-plus-square"></i>&nbsp<small class="d-none d-sm-inline-block">Создать</small>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" style="font-size: 0.85rem ">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Url</th>
                            <th scope="col">Дата&nbsp;c</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($sources as $source)
                            <tr>
                                <th scope="row">{{$source->id}}</th>
                                <td>{{$source->name}}</td>
                                <td>{{$source->description}}</td>
                                <td>{{$source->url}}</td>
                                <td class="text-nowrap">{{$source->created_at}}</td>
                                <td class="text-center p-0" style="width: 40px">
                                    <a href="{{route('admin.sources.edit',['source'=>$source->id])}}"
                                       class="btn link-primary">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </td>
                                <td class="text-center p-0" style="width: 40px">
                                    <a href="javascript://" class="btn link-danger">
                                        <i class="bi bi-dash-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <h6>Источников новостей пока нет</h6>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{$sources->links()}}
            </div>
        </div>
    </section>

@endsection


