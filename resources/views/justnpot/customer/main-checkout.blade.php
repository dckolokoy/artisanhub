@extends('justnpot/customer-main')
@section('title', 'Checkout')
@section('content')

    @php
    $totalAmount = 0;
    $currentDate = Carbon\CarbonImmutable::now()->setTimezone('Asia/Singapore');

    $delivery_date_from = $currentDate->format('Y-m-d');
    $delivery_date_to = $currentDate->addMonths(3)->format('Y-m-d');
    $delivery_time_from = $currentDate->format('H:i');
    $transactionId = $data['cart'][0]['transaction_id'];
    @endphp



    <div class="container" style="margin-top: 100px; width: 50%;">
        <div style="">
            <form id="transaction_form" class="">
                <table align="center" border="1" cellspacing="14" cellpadding="12" style="width: 100%">
                    <tr>
                        <th>
                            <h3 align="center" style="font-size: 1.3em;">Fill Up Details To Deliver Your Item</h3>
                        </th>
                        <br>
                    </tr>
                    <tr align="center">
                        <td style="color: red"> Enter your name <br>
                            <input type="text" name="nm" placeholder="Enter your name" id="name"
                                style="width: 100%; padding: 10px; color: orange; background-color: black" required=""
                                pattern="[a-z,A-Z]*">
                        </td>
                    </tr>
                    <tr align="center">
                        <td style="color: red"> Enter Mobile no <br>
                            <input type="no" name="mo" placeholder="Enter Mobile no." id="contact_no"
                                style="width: 100%; padding: 10px; color: orange; background-color: black" required=""
                                pattern="\d{10}">
                        </td>
                    </tr>

                    <tr align="center">
                        <td style="color: red"> Enter Email address <br>
                            <input type="Email" name="em" placeholder="Enter Email address" id="email_address"
                                style="width: 100%; padding: 10px; color: orange; background-color: black" required>
                        </td>
                    </tr>

                    <tr align="center">
                        <td style="color: red"> Enter delivery address <br>
                            <textarea type="text" rows="2" name="ad" placeholder="Enter your delivery address" id="address"
                                style="width: 100%; padding: 10px; color: orange; background-color: black" required></textarea>
                        </td>
                    </tr>

                    <tr align="center">
                        <td style="color: red">Date and Time of Delivery<br><br>
                            {{-- 0 - order now, 1 - Scheduled --}}
                            <div align="center">
                            <input type="radio" id="del_order_now" name="order_type" value="0" class="del"
                                checked="checked">
                            <label for="del_order_now">Order Now</label><br>
                            <input type="radio" id="del_order_later" name="order_type" value="1" class="del">
                            <label for="del_order_later">Scheduled Order</label>
                            <div id="delivery_date_time">
                                <input type="date" name="party" min="{{ $delivery_date_from }}"
                                    max="{{ $delivery_date_to }}" id="delivery_date" value="{{ $delivery_date_from }}"
                                    required />

                                <input type="time" name="delivery_time" min="07:00" max="24:00" id="delivery_time"
                                    value="{{ $delivery_time_from }}" required>
                            </div>
                        </div>
                        </td>
                    </tr>

                    <tr align="center">
                        <td style="color: red"> Mode Of Payment<br><br>
                            {{-- 0 = gcash, 1 = COD --}}
                            <input type="radio" id="mop_gcash" name="mop" value="0" class="mop" checked="checked">
                            <label for="mop_gcash">Gcash</label><br>
                            <input type="radio" id="mop_cod" name="mop" value="1" class="mop">
                            <label for="mop_cod">Cash on Delivery (COD)</label>
                            <div id="gcash_image" align="center">
                                <img src="{{ url('justnpot/images/qr/qr_v1.jpg') }}" width="50%" height="auto"
                                    class="img-fluid" align="center">
                            </div>
                            <br>
                        </td>
                    </tr>

                    <tr align="center">
                        <td colspan="4">
                            {{-- <button  name="s" value="Confirm Order" id="btn-confirm"style="height: 50px; background-color:lightgreen; color: black; padding: 10px; width: 30%;">Confirm</button> --}}
                            <button type="button" id="btn-confirm" class="btn btn-common" data-toggle="modal"
                                data-target="#exampleModal">
                                Confirm Details
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
            <br> <br>
        </div>
    </div>
@stop


<!-- Modal -->
<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Review payment and orders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <h2> Details </h2>
                <p>
                <p> Name: <span id="confirm_name" style="color:black"> </span>
                    <br>
                    Mobile No: <span id="confirm_contact_no" style="color:black"> </span>
                    <br>
                    Email Address: <span id="confirm_email_address" style="color:black"> </span>
                    <br>
                    Address: <span id="confirm_address" style="color:black"> </span>
                    <br>
                    Date and Time Of Delivery: <span id="confirm_delivery_date_time" style="color:black"> </span>
                    <br>
                    Mode of Payment: <span id="confirm_mode_of_payment" style="color:black"> </span>
                </p>
                <p>
                <h2> Orders </h2>
                <table border=1 width="80%" align="center" cellpadding="8" cellspacing="10" style="color: black">
                    <tr>
                        <th>Product </th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>

                    @foreach ($data['cart'] as $cartItems)
                        <tr>
                            <td>{{ $cartItems['name'] }}</td>
                            <td>{{ $cartItems['price'] }}</td>
                            <td>{{ $cartItems['quantity'] }}</td>
                            <td>{{ $cartItems['price'] * $cartItems['quantity'] }}</td>
                        </tr>
                        @php
                            $totalAmount += $cartItems['price'] * $cartItems['quantity'];
                        @endphp
                    @endforeach
                </table>

                <p>
                <h3> Total: <span style="color:red;"> PHP {{ $totalAmount }} <span> </h3>
                </p>
                <p>
                    <hr>
                <p>More Detail to Contact 24x7 <br>
                    +91 99240 42799</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-common" id="confirm_checkout">Checkout</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Review payment and orders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <h2> Details </h2>
                <p>
                <p> Name: <span id="confirm_name" style="color:black"> </span>
                    <br>
                    Mobile No: <span id="confirm_contact_no" style="color:black"> </span>
                    <br>
                    Email Address: <span id="confirm_email_address" style="color:black"> </span>
                    <br>
                    Address: <span id="confirm_address" style="color:black"> </span>
                    <br>
                    Date and Time Of Delivery: <span id="confirm_delivery_date_time" style="color:black"> </span>
                    <br>
                    Mode of Payment: <span id="confirm_mode_of_payment" style="color:black"> </span>
                </p>
                <p>
                <h2> Orders </h2>
                <table border=1 width="80%" align="center" cellpadding="8" cellspacing="10" style="color: black">
                    <tr>
                        <th>Product </th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>

                    @foreach ($data['cart'] as $cartItems)
                        <tr>
                            <td>{{ $cartItems['name'] }}</td>
                            <td>{{ $cartItems['price'] }}</td>
                            <td>{{ $cartItems['quantity'] }}</td>
                            <td>{{ $cartItems['price'] * $cartItems['quantity'] }}</td>
                        </tr>
                        @php
                            $totalAmount += $cartItems['price'] * $cartItems['quantity'];
                        @endphp
                    @endforeach
                </table>

                <p>
                <h3> Total: <span style="color:red;"> PHP {{ $totalAmount }} <span> </h3>
                </p>
                <p>
                    <hr>
                <p>More Detail to Contact 24x7 <br>
                    +91 99240 42799</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-common" id="confirm_checkout">Checkout</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            // initialize
            $('#delivery_date_time').hide();

            $('.mop').click(function() {
                if ($('#mop_gcash').is(':checked')) {
                    $('#gcash_image').show();
                    return;
                }
                $('#gcash_image').hide();
                return;
            });

            $('.del').click(function() {
                if ($('#del_order_later').is(':checked')) {
                    $('#delivery_date_time').show();
                    return;
                }
                $('#delivery_date_time').hide();
                return;
            });


            $('#confirm_checkout').on('click', function() {
                invokeCheckout();
            });

            // assigning
            function getFormData() {
                let name = $('#name').val();
                let mobile_no = $('#contact_no').val();
                let email_address = $('#email_address').val();
                let address = $('#address').val();
                let note = '';
                let mode_of_payment = document.querySelector('input[name="mop"]:checked').value;
                let order_type = document.querySelector('input[name="order_type"]:checked').value;
                let delivery_schedule = {!! json_encode($currentDate->format('Y-m-d H:i')) !!}
                let delivery_schedule_summary = 'Order Now ' + '(' + delivery_schedule + ')';
                let mop = 'GCASH';

                // SCHEDULED ORDER = 1
                if (order_type == 1) {
                    // scheduled order
                    delivery_schedule = $('#delivery_date').val() + ' ' + $('#delivery_time').val();
                    delivery_schedule_summary = 'Scheduled Order ' + '(' + delivery_schedule + ')';
                }

                if (mode_of_payment == 0) {
                    mop = 'GCASH';
                } else {
                    mop = 'Cash on Delivery (COD)';
                }

                return {
                    name: name,
                    mobile_no: mobile_no,
                    email_address: email_address,
                    address: address,
                    note: note,
                    mode_of_payment: mode_of_payment,
                    order_type: order_type,
                    delivery_schedule: delivery_schedule,
                    delivery_schedule_summary: delivery_schedule_summary,
                    mop: mop,
                    transaction_id: {!! json_encode($transactionId) !!}

                }
            }

            // open confirmation modal
            $('#btn-confirm').on('click', function() {
                let formData = getFormData();
                $("#confirm_name").text(formData.name);
                $("#confirm_contact_no").text(formData.mobile_no);
                $("#confirm_email_address").text(formData.email_address);
                $("#confirm_address").text(formData.address);
                $("#confirm_mode_of_payment").text(formData.mop);
                $("#confirm_delivery_date_time").text(formData.delivery_schedule_summary);
            });

            async function invokeCheckout() {
                let formData = getFormData();
                let response = await postCheckout(
                    formData.name, formData.mobile_no, formData.email_address, formData.address, formData
                    .note, formData.transaction_id,
                    formData.mode_of_payment, formData.delivery_schedule, formData.order_type
                );
            }

            function postCheckout(
                name,
                mobile_no,
                email_address,
                address,
                note,
                transaction_id,
                mode_of_payment,
                delivery_schedule,
                order_type
            ) {

                $.ajax({
                    type: "POST",
                    url: "/api/customer/transaction/checkout",
                    data: {
                        'name': name,
                        'mobile_no': mobile_no,
                        'email_address': email_address,
                        'address': address,
                        'note': note,
                        'transaction_id': transaction_id,
                        'mode_of_payment': mode_of_payment,
                        'delivery_schedule': delivery_schedule, // Y-m-d
                        'order_type': order_type,
                    },
                    success: function(response) {
                        if (response.success == true) {
                            alert('Order Place Successfully.');
                            let cartRoute = {!! json_encode(route('customer-cart')) !!};
                            window.location.replace(cartRoute);
                            return true;
                        }
                        alert('Something went wrong.');
                        return false;
                    }
                });
            }
        });

    </script>

@endsection
