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
    <div class="container" style="margin-top: 100px;">
        <div class="row ">
            <div class='col'>
                <center>
                    <p style="font-size: 2.4em; color: red"> RESERVATION HISTORY ({{count($data['myReservationsHistory'])}})</p>
                </center>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            @foreach ($data['myReservationsHistory'] as $key => $reservations)
                @php
                    $reservationDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservations['reservation_date']);
                    $bookedOn = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservations['created_at']);
                    $paymentType = $reservations['payment_type'] == 0 ? 'GCash' : 'Cash';
                    $totalAmount = 'PHP ' . number_format((float) $reservations['total_amount'], 2, '.', '');
                    $status = App\Http\Controllers\CustomerController::getTransactionStatusById($reservations['status']);
                @endphp


                <div class="col-md-4 col-sm-12 my-3">
                    <div class="card h-100">
                        <div class="h-50 py-2" align="center" style='background-color:#8b0000; color: white;'>
                            <h2 style="color: white;" class='py-0'>{{ $reservationDate->format('F d, Y') }} </h2>
                            <h3 style="color: white;" class='py-0'>{{ $reservationDate->format('h:i A') }}</h3>
                            <h4 style="color: white;" class='py-0'>{{ $reservationDate->format('l') }}</h4>
                        </div>
                        <div class="card-body">
                            <h3>Transaction Number</h3>
                            <p>{{ $reservations['transaction_id'] }}</p>
                            <h3>Payment Type</h3>
                            <p>{{ $paymentType }}</p>
                            <h3>Total Amount</h3>
                            <p>{{ $totalAmount }}</p>
                            <h3>Status</h3>
                            <p>{{ $status }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Booked on {{ $bookedOn->format('F d, Y h:i A') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop



@section('scripts')
    <script>


    </script>
@endsection
