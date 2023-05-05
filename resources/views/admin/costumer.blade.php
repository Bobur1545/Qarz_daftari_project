@extends('admin.layout.app')
@section('content')

    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        {{--                    modal uchun button--}}
                        <button type="button" id="showModal" style="margin: 30px;" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"> @lang('message.create_button') </button>

                        <table class="table table-hover">
                            <thead>
                            <tr>

                                <th>
                                    @lang('message.id')
                                </th>
                                <th>
                                    @lang('message.cust_name')
                                </th>
                                <th>
                                    @lang('message.phone_num')
                                </th>
                                <th>
                                    @lang('message.address')
                                </th>
                                <th>
                                    @lang('message.description')
                                </th>
                                <th>
                                    @lang('message.debt')
                                </th>
                                <th>
                                    @lang('message.status')
                                </th>
                                <th>
                                    @lang('message.operation')
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($costumers as $costumer)
                                <tr>
                                    <td>{{$costumer->id}}</td>
                                    <td>{{$costumer->name}}</td>
                                    <td>{{$costumer->phone}}</td>
                                    <td>{{$costumer->address}}</td>
                                    <td>{{$costumer->description}}</td>
                                    <td><span class="money">{{$costumer->debt}}</span></td>
                                    <td>{{$costumer->trust_status}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('admin'))
                                        <form action="{{route('costumer.destroy', $costumer->id)}}" id="deleteCostumerForm{{$costumer->id}}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button onclick="del({{$costumer->id}})" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                        </form>

                                            <a onclick="func({{$costumer}}, '{{ route('costumer.update', $costumer->id) }}')"
                                               id="showModal" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-pencil"></i></a>
                                        @endif

                                        <a href="{{route('debt_info',$costumer->id)}}" class="btn btn-primary" ><i class="fa fa-wallet"></i></a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $costumers->links() }}

                    </div>

                </div>

            </div>
        </div>


        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ma'lumotlarni yangilash</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form  action="{{route('costumer.update', $costumer->id)}}"  id="update_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input id="fid" type="hidden" name="id" required>

                            <label for="name">Mijoz nomini yangilash</label>
                            <input type="text" id="fname" name="name" value="" class="form-control" required>

                            <label for="phone">Mijoz telefon raqamini yangilash</label>
                            <input type="text" id="fphone" name="phone" value="" class="form-control" required>

                            <label for="address">Mijoz manzilini yangilash</label>
                            <input type="text" id="faddress" name="address" class="form-control" value=""  required>

                            <label for="description">Mijoz tasvirini yangilash</label>
                            <input type="text" id="fdescription" name="description" value="" class="form-control">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                                <button type="submit" class="btn btn-primary">Tahrirlash</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>


        {{--    create modal uchun--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('message.enter_inform_cust')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('costumer.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="name">@lang('message.enter_cust_name')</label>
                            <input type="text" id="name" name="name"  class="form-control" required>

                            <label for="phone">@lang('message.enter_cust_phone')</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>

                            <label for="address">@lang('message.enter_cust_address')</label>
                            <input type="text" id="address" name="address" class="form-control">

                            <label for="description">@lang('message.enter_cust_description')</label>
                            <input type="text" id="description" name="description" class="form-control">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('message.close')</button>
                                <button type="submit" class="btn btn-primary">@lang('message.save_button')</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    </div>

@endsection
@section('script')
    <script>
        function func(costumer, route){
            console.log(costumer.name);
            document.getElementById('fid').value = costumer.id;
            document.getElementById('fname').value = costumer.name;
            console.log(costumer.phone);
            document.getElementById('fphone').value = costumer.phone;
            console.log(costumer.address);
            document.getElementById('faddress').value = costumer.address;
            console.log(costumer.description);
            document.getElementById('fdescription').value = costumer.description;
            var form = document.getElementById('update_form');
            form.setAttribute('action', route);
        }

        function del(id){
            Swal.fire({
                title: 'Haqiqatdanam o\'chirishni xohlaysizmi?',
                text: "O\'chirilgandan so\'ng siz uni qayta tiklay olmaysiz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ha, o\'chirilsin!',
                cancelButtonText: 'Bekor qilish',

            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteCostumerForm'+id).submit();
                }
            })}

        $('.money').simpleMoneyFormat();
        console.log($('.money').text());
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

