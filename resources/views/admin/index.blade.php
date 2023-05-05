@extends('admin.layout.app')
@section('content')

    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        {{--                    modal uchun button--}}
                        <a href="{{url('addUser')}}"  style="margin: 30px;" class="btn btn-success">@lang('message.create_button')</a>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">@lang('message.no')</th>
                                <th scope="col">@lang('message.name')</th>
                                <th scope="col">@lang('message.email')</th>
                                <th scope="col">@lang('message.role')</th>
                                <th scope="col">@lang('message.operation')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>

                                    <td>{{ $user->getRoleNames()->implode(',')}}</td>

                                    <td>

                                        <form action="{{url('destroy/'. $user->id)}}" id="deleteCostumerForm{{$user->id}}" method="GET">
                                            @csrf
                                            @method('DELETE')
                                            @if(auth()->user()->hasPermissionTo('profile.destroy') && auth()->user()->hasRole('admin'))
                                            <button onclick="del({{$user->id}})" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
@endif
                                            <a class="btn btn-warning" href="{{url('editUser/'.$user->id)}}"> <i class="fa fa-pencil"></i> </a>
                                            <a href="{{route('admin.permission',$user->id)}}" class="btn btn-primary"><i class="fa fa-user"></i></a>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>

                </div>

            </div>
        </div>

    </div>


@endsection
@section('script')
    <script>
        // form = document.getElementById('deleteCostumerForm');
        function del(id){
            Swal.fire({
                title: 'Haqiqatdanam o\'chirishni xohlaysizmi?',
                text: "O\'chirilgandan so\'ng siz uni qayta tiklay olmaysiz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ha, o\'chirilsin!',
                cancelButtonText: 'Bekor qilish'

            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteCostumerForm'+id).submit();
                }
            })}



    </script>

    @if (session('success'))

        <script>

            $(document).ready(function() {

                Swal.fire({
                    showConfirmButton: false,
                    timer: 2000,

                    title:'{{session('success')}}',
                    icon:'success',

                });
            });
        </script>

    @endif
@endsection
{{--toLocaleString()--}}
