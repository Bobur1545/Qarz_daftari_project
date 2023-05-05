@extends('admin.layout.app')
@section('content')


<div class="container" style="margin-top: 22px">
    <div class="row">
        <div class="col-md-12">
            <h2>@lang('message.add_data')</h2>
            <form method="post" action="{{url('store')}}">
                @csrf
                <div class="col-md-5">
                    <label class="form-label">@lang('message.name')</label>
                    <input type="text" class="form-control" name="name" placeholder="@lang('message.input_name')" required>
                </div>

                <div class="col-md-5">
                    <label class="form-label">@lang('message.email')</label>
                    <input type="email" class="form-control" name="email" placeholder="@lang('message.input_email')" required>
                </div>

                <div class="col-md-5">
                    <label class="form-label">@lang('message.password')</label>
                    <input type="password" class="form-control" name="password" placeholder="@lang('message.input_password')" required>
                </div>


                <div class="col-md-5">
                    <label class="form-label">@lang('message.input_role')</label>
                    <select class="custom-select" style="" id="selectBox" required name="role[]" multiple>
                        @foreach($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary" style="margin: 10px;">@lang('message.save_button')</button>
                <a href="{{route('admin.index')}}" class="btn btn-danger">@lang('message.back_button')</a>
            </form>
            </form>
        </div>
    </div>
</div>

@endsection
