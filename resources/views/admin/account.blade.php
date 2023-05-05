@extends('admin.layout.app')
@section('content')

    <div class="container" style="margin-top: 22px">
        <div class="row">
            <div class="col-md-12">
                <h2>@lang('message.update_data')</h2>
                <form method="POST" action="{{ route('updatePassword') }}">
                    @csrf

                    <div class="col-md-5">
                        <label class="form-label">eski parol</label>
                        <input type="password" class="form-control" name="old_password" placeholder="eski parolni kiriting">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">yangi parol</label>
                        <input type="password" class="form-control" name="new_password" placeholder="yangi parolni kiriting">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">qayta urinish</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="parolni qayta kiriting">
                    </div>


                    <button type="submit" class="btn btn-primary" style="margin: 10px;">@lang('message.update_button')</button>
                    <a href="{{route('admin.index')}}" class="btn btn-danger">@lang('message.back_button')</a>
                </form>
                </form>
            </div>
        </div>
    </div>

@endsection
