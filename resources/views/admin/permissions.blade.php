@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="select">
            <form class="form-inline" action="{{route('add_permission',[$user->id])}}" method="POST">
                <div class="form-group mx-sm-3 mb-2">
                    @csrf
                    <select name="permission" class="form-control" id="">
                        @foreach($permissions as $per)
                            <option value="{{$per->name}}">{{$per->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="@lang('message.save_button')">
            </form>
        </div>


        <div class="list">
            <ul class="list-group">

                @foreach($user_permissions as $permission)
                    <li class="list-group-item"><a href="{{route('admin.permission.revoke',[$permission->name,$user->id])}}"><p>{{$permission->name}}</p></a></li>
                @endforeach
            </ul>
        </div>
    </div>


@endsection
