
 @extends('layouts.admin')

@section('title')
    @parent - Список пользователей
@endsection

@section('content')

    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Редактирование новостей</h5>
                    <a href="{{route('admin.users.create')}}" class="card-title px-2">
                        <i class="bi bi-plus-square"></i>&nbsp<small class="d-none d-sm-inline-block">Создать</small>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-md" style="font-size: 0.85rem ">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Админ</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Last login</th>
                            <th scope="col">Создано</th>
                            <th scope="col">Измен</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $user)
                            <tr id="users{{$user->id}}">
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td class="text-center"><input type="checkbox" @checked($user->is_admin) disabled /></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->last_login_at}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td class="text-center p-0" style="width: 40px">
                                    <a href="{{route('admin.users.edit',['user'=>$user->id])}}" class="btn link-primary">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </td>
                                <td class="text-center p-0" style="width: 40px">
                                    <a href="javascript:;" class="btn link-danger remove" id="users{{$user->id}}">
                                        <i class="bi bi-dash-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <h6>Пользователей пока нет</h6>
                        @endforelse
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </section>

@endsection


