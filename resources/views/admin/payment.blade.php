@extends('admin.layout.app')
@section('content')
    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        {{--                    modal uchun button--}}
                        <button type="button" id="showModal" style="margin: 30px;" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">@lang('message.create_button')</button>

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
                                    @lang('message.user_name')
                                </th>
                                <th>
                                    @lang('message.payment')
                                </th>
                                <th>
                                    @lang('message.today_day')
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->costumer->name}}</td>
                                    <td>{{$payment->user->name}}</td>
                                    <td><span class="money">{{$payment->quantity}}</span></td>
                                    <td>{{$payment->created_at}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
{{$payments->links()}}

                    </div>

                </div>

            </div>
        </div>


        {{--    create modal uchun--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('message.enter_payment')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('payment.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="title">@lang('message.select_cust')</label>
                            <select class="custom-select" style="" required name="costumer_id">
                                @foreach($costumers as $costumer)
                                    <option value="{{$costumer->id}}">{{$costumer->name}}</option>
                                @endforeach
                            </select>

                            <label for="quantity" style="margin-top: 15px;">@lang('message.money')</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" required>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('message.close')</button>
                                <button type="submit" class="btn btn-primary">@lang('message.save_button')</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
@endsection
        @section('script')
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
                <script>
                    $('.money').simpleMoneyFormat();
                    console.log($('.money').text());
                </script>
@endsection
