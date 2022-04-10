@extends('layouts.withDatatable')

@section('content')
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#itemList').DataTable({
                "ordering": false,
                "searching": false
            });
        });

    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mng_Stock/mng_Stock.css') }}">
    <script type="text/javascript" src="{{ asset('js/mng_Stock/mng_Stock.js') }}"></script>

    <div class="container">
        <a href="javascript:window.history.back();"><i class="fas fa-arrow-circle-left fa-3x left"></i></a>
        <h3 class="center">Update Order</h3>
        <hr class="hr">
    </div>
    <div class="container" style="width:85%; margin-top:10px; border: 1px solid black;">
        @foreach ($base as $data)
            <form action="/mngNewStck/orderRec/{{ $data->order_id }}" method="POST">
                @csrf
                <table style="width:100%; border: 0px solid white;">
                    <tr>
                        <td>
                            <h3 class="center" style="margin-top:3px;">Order Details</h3>
                            <hr class="hr">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:70%; margin-left:10px; border:1px solid white;">
                                <tr>
                                    <td style="text-align: left; padding-left:10px;">
                                        <label for="order_id">Order ID: {{ $data->order_id }}</label>
                                        <input type="text" name="order_id" value="{{ $data->order_id }}"
                                            style="display:none;" disable>
                                    </td>
                                    <td style="text-align: left; padding-left:10px;">
                                        <label>Order Date: {{ $data->created_at }}</label>
                                    </td>
                                    <td style="text-align: left; padding-left:10px;">
                                        <label for="status">Status:</label>
                                        <select name="status" id="status">
                                            <option value="Order Sent">Order Sent</option>
                                            <option value="Order Completed">Order Completed</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; padding-left:10px;">
                                        <label>Staff ID: {{ $data->staff_id }}</label>
                                    </td>
                                    <td style="text-align: left; padding-left:10px;">
                                        <label>Staff Name: {{ $data->name }}</label>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
        @endforeach
        </table>
        </td>
        </tr>
        <tr>
            <td>
                <hr class="hr">
            </td>
        </tr>
        <tr>
            <td>
                <table id="itemList" class="display" style="width: 100%;border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Supplier ID</th>
                            <th>Supplier Name</th>
                            <th>Price Per Item</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td> {{ $a++ }} </td>
                                <td> {{ $data->item_id }} </th>
                                <td> {{ $data->item_name }} </td>
                                <td> {{ $data->vendor_id }} </td>
                                <td> {{ $data->vendor_name }} </td>
                                <td> {{ $data->item_price }} </td>
                                <td> {{ $data->order_qty }} </td>
                                <td> {{ $data->item_total_price }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="display:none;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>
        </table>
        <div class="right" style="margin-top:10px;">
            @foreach ($base as $data)
                <label>Total Price: RM </label>
                <input type="number" value="{{ $data->total_price }}" readonly>
            @endforeach
        </div>
        <br><br><br>
        <div class="container">
            <button class="right dt-button" type="button" style="margin-top:10px; margin-left:5px;"
                onClick="javascript:window.history.back();" ;>Cancel</button>
            <input type="submit" class="right dt-button" style="margin-top:10px; margin-right:5px; height:33px;"
                value="Update Order Record">
        </div>
        </form>
    </div>

@endsection
