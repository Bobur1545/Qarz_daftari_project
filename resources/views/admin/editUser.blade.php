@extends('admin.layout.app')
@section('content')

    <div class="container" style="margin-top: 22px">
        <div class="row">
            <div class="col-md-12">
                <h2>@lang('message.update_data')</h2>

                <form method="post" action="{{route('update',$user->id)}}">
                    @csrf
                    @method("PUT")
                    <input value="{{$user->id}}" style="display: none" required name="id">
                    <div class="col-md-5">
                        <label class="form-label">@lang('message.name')</label>
                        <input type="text" class="form-control" name="name" placeholder="@lang('message.update_name')"
                               value="{{$user->name}}">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">@lang('message.email')</label>
                        <input type="email" class="form-control" name="email" placeholder="@lang('message.update_email')"
                               value="{{$user->email}}">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">@lang('message.password')</label>
                        <input type="password" class="form-control" name="password" placeholder="@lang('message.update_password')">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">@lang('message.role')</label>
                        <select class="custom-select" style="" id="selectBox" required name="role[]" multiple>
                            @foreach($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin: 10px;">@lang('message.update_button')</button>
                    <a href="{{route('admin.index')}}" class="btn btn-danger">@lang('message.back_button')</a>
                </form>
                </form>
            </div>
        </div>
    </div>

@endsection
