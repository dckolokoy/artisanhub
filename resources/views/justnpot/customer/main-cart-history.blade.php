@extends('justnpot.customer-main')
@section('title', 'Cart')
@section('content')
    <style type="text/css">
        tr {}

        tr:hover {
            background-color: lightgreen;
            color: black;

        }

    </style>
    <div style="margin-top: 100px">
        {{-- transaction history --}}
        <div>
            <div style="width: 90%; margin: 0 auto;">
                <center>
                    <p style="font-size: 2.4em; color: red"> ORDER HISTORY ({{ count($data['cartHistory']) }})</p>
                </center>
                @if (count($data['cartHistory']) != 0)
                    @foreach ($data['cartHistory'] as $key => $cart)
                        <div class="text-center">
                            <h1>Transaction ID: {{ $cart[0]['transaction_id'] }} </h1>
                            <p align="center">
                                <br>
                                Order Status:
                                {{ App\Http\Controllers\CustomerController::getTransactionStatusById($cart[0]['status']) }}
                            <p>
                            <table border=1 width="80%" align="center" cellpadding="8" cellspacing="10"
                                style="color: black">
                                <tr>
                                    <th>Image </th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                @php
                                    $grandTotal = 0;
                                @endphp
                                @foreach ($cart as $key => $cartItems)
                                    <tr>
                                        <td align="right"><img src="{{ asset($cartItems['image']) }}" width=100
                                                height=100>
                                        </td>
                                        <td>{{ $cartItems['price'] }}</td>
                                        <td>{{ $cartItems['quantity'] }}</td>
                                        <td>{{ $cartItems['price'] * $cartItems['quantity'] }}</td>
                                    </tr>

                                    @php
                                        $grandTotal += $cartItems['price'] * $cartItems['quantity'];
                                    @endphp
                                @endforeach

                            </table>
                            <p align="center">
                                <br>
                                Total: {{ $grandTotal }}
                            <p>

                                @if ($loop->last == false)
                                    <hr>
                                @endif
                    @endforeach
                @endIf
            </div>
        </div>
    </div>
    </div>
    </div>

@stop



@section('scripts')
    <script>

    </script>
@endsection
