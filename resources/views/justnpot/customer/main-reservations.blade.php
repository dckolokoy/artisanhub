@extends('justnpot/customer-main')
@section('title', 'Checkout')
@section('content')
    <br><br><br>
    <div class="container mt-50">

        <hr>
        <div class="py-2" align="center">
            <form class="text-center mb-2">
                <div class="" align="center">
                    <div class="pt-2">
                        <h3>Reservation Date</h3>
                    </div>
                    <small id="passwordHelpInline" class="text-muted">
                        Pick reservation date below.<br>Disabled dates are fully booked.
                    </small>
                </div>
            </form>
            <input type="text" id="dateFrom1" name="dateFrom1" class="form-control mx-sm-3 datePicker" style="width: 200px;"
                placeholder="Calendar" readonly />
        </div>
        <hr>
        <div class="" align="center">
            <div class="d-flex justify-content-center pb-2">
                <div class=" mt-2">

                    <div class="">
                        <div class="pt-2" align="center">
                            <h3>Meal Time</h3>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="meal_time" id="meal_time_lunch" value="1"
                                disabled>
                            <label class="form-check-label" for="meal_time_lunch">
                                Lunch (11:00 AM - 2:00PM)
                            </label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="meal_time" id="meal_time_dinner" value="2"
                                disabled>
                            <label class="form-check-label" for="meal_time_dinner">
                                Dinner (6:00 PM - 9:00 PM)
                            </label>
                        </div>


                    </div>
                </div>

            </div>
            <hr>
        </div>
{{-- <h1>{{ Auth::user()->id }} </h1> --}}
        <div class="" align="center">
            <div class="d-flex justify-content-center pb-2">
                <div class=" mt-2">

                    <div class="">
                        <div class="pt-2" align="center">
                            <h3>Mode Of Payment</h3>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mop" class="r_mop" id="mop_gcash" value="0"
                                checked="checked">
                            <label class="form-check-label" for="mop_gcash">
                                GCash
                            </label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="mop" class="r_mop" id="mop_cash" value="1">
                            <label class="form-check-label" for="mop_cash">
                                Cash
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="d-flex justify-content-center pb-2" id="gcash_transaction_grp">
                <div class=" mt-2">

                    <div class="">
                        <div class="pt-2" align="center">
                            <h1>Transaction Details</h1>
                        </div>

                        <div class="form-check my-2">
                            <div id="gcash_image" class="mb-2">
                                <img src="{{ url('justnpot/images/qr/qr_v1.jpg') }}" width="300px" height="auto"
                                    class="img-fluid">
                            </div>
                            <div class="pt-2" align="center">
                                <h3>Gcash Transaction Number</h3>
                            </div>

                            <input type="text" id="gcash_transaction_number" name="" class="form-control mx-sm-3"
                                style="width: 300px;" placeholder="Transaction Number" />
                        </div>

                        <form class="text-center mb-2 my-2 ">
                            <div class="" align="center">
                                <div class="pt-2">
                                    <h3>Name</h3>
                                </div>
                            </div>

                        </form>
                        <div class="form-check my-2">
                            <input type="text" id="r_name" name="" class="form-control mx-sm-3 my-0" style="width: 300px;"
                                placeholder="Name" />
                        </div>

                        <form class="text-center mb-2 my-2 ">
                            <div class="" align="center">
                                <div class="pt-2">
                                    <h3>Email address</h3>
                                </div>
                            </div>

                        </form>

                        <div class="form-check my-2">
                            <input type="text" id="r_email" name="" class="form-control mx-sm-3" style="width: 300px;"
                                placeholder="Email address" />

                        </div>


                        <form class="text-center mb-2 my-2 ">
                            <div class="" align="center">
                                <div class="pt-2">
                                    <h3>Mobile No.</h3>
                                </div>
                            </div>

                        </form>


                        <div class="form-check my-2">
                            <input type="tel" id="r_mobile" name="" class="form-control mx-sm-3 my-2" style="width: 300px;"
                                placeholder="Mobile No." maxLength="11"/>

                        </div>

                    </div>
                </div>
            </div>


            <div class="form-check my-2">
                <div class="">
                    <button type="" class="btn btn-common"  data-target="#reservationConfirmModal" id="btn-reservation-proceed" >Proceed</button>

                </div>
            </div>
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade show" id="reservationConfirmModal" tabindex="-1" role="dialog" aria-labelledby="reservationConfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationConfirmModalLabel">Review payment and orders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2> Details </h2>
                <p> Name: <span id="confirm_name" style="color:black"> </span>
                    <br>
                    Mobile No: <span id="confirm_contact_no" style="color:black"> </span>
                    <br>
                    Email Address: <span id="confirm_email_address" style="color:black"> </span>
                    <br>
                    Mode of Payment: <span id="confirm_mode_of_payment" style="color:black"> </span>
                    <br>
                    Transaction Number: <span id="confirm_gcash_transaction_number" style="color:black"> </span>
                </p>

                <h2> Reservation </h2>
                <h3> Date: <span style="color:red;" id="confirm_reservation_date"> <span> </h3>
                <h3> Meal Time: <span style="color:red;" id="confirm_meal_time"> <span> </h3>
                <h3> Total: <span style="color:red;"  id="confirm_total"> <span> </h3>
                </p>
                <p>
                    <hr>
                <p>More Detail to Contact 24x7 <br>
                    +91 99240 42799</p>
            </div>
            <div class="modal-footer">
                <button type="" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="" class="btn btn-primary" id="confirm_reserve" style="background-color:lightgreen; color: black; ">Reserve</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade show" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="reservationConfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationConfirmModalLabel"> Error </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><span id="error_message" style="color:black"> </span>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-sm btn-common" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <style>
        .input-group-append {
            cursor: pointer;
        }

    </style>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet" /> --}}

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.standalone.min.css" />
    {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>


    <script>
        console.log({!! json_encode($reserved_dates) !!})
        $('document').ready(function() {

            $('.datePicker').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '+2d',
                endDate: '+12m',
                datesDisabled: {!! json_encode($reserved_dates['reservedBoth']) !!},
                autoclose: true,
                todayHighlight: true,
                changeYear: false,
                maxViewMode: 'year',
                maxDate: "+12m"
            });

            $(".datePicker").datepicker().on('change', function(event) {
                const datePicker = ($(".datePicker").datepicker('getDate'))
                var date = new Date(datePicker)
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const validDate = [year, month, day].join('-');

                checkMealTimeAvailability(validDate);

                $("#meal_time_dinner").prop('checked', false);
                $("#meal_time_lunch").prop('checked', false);
            });

            $('#btn-reservation-proceed').on('click', function(e) {
                let isValid = validate();
                if (isValid != true) {
                    $('#error_message').text(isValid);
                    $('#errorModal').modal('show');
                    return;
                }
                setConfirmationModal();
                $('#reservationConfirmModal').modal('show');
                return;
            });

            $("#r_mobile").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg").html("Digits Only").show().fadeOut("slow");
                        return false;
                }
            });

            $('#confirm_reserve').on('click', function(e){
                invokeReservation();
            });

        });


        function invokeReservation()
        {
            console.log(invokeReservation)
            let formData = getFormData();
            console.log(formData)
            postCheckout(
                formData['name'],
                formData['mobile_no'],
                formData['email_address'],
                formData['mode_of_payment'],
                formData['order_type'],
                formData['reservation_date_ymdhis'],
                formData['gcash_transaction_number'],
            );
            $('#reservationConfirmModal').modal('hide');
            location.reload()
        }

        function postCheckout(
                name,
                mobile_no,
                email_address,
                mode_of_payment,
                order_type,
                reservation_date,
                transaction_number
        ) {
                $.ajax({
                    type: "POST",
                    url: "/api/customer/transaction/checkout",
                    data: {
                        'name': name,
                        'mobile_no': mobile_no,
                        'email_address': email_address,
                        'mode_of_payment': mode_of_payment,
                        'order_type': order_type,
                        'reservation_date': reservation_date,
                        'transaction_number': transaction_number
                    },
                    success: function(response) {
                        if (response.success == true) {
                            alert('Reservation is successfully processed.');
                            return true;
                        }
                        alert('Something went wrong.');
                        return false;
                    }
                });
            }



        function validate() {
            let success = true;

            if (($(".datePicker").datepicker('getDate')) == null) {
                return 'Invalid Reservation Date';
            }
            if ($("input[name='meal_time']:checked").val() == undefined) {
                console.log('meal_time');
                return 'Invalid Meal time';
            }

            if ($("input[name='mop']:checked").val() == undefined) {
                console.log('mop');
                return 'Select Mode Of Payment.';
            }

            if ($('#r_name').val() == '') {
                console.log('name');
                return 'Enter your Name';
            }

            if ($('#r_mobile').val() == '') {
                console.log('mobile');
                return 'Enter your Mobile number';
            }
            if ($('#r_email').val() == '') {
                console.log('email');
                return 'Enter your Email Address';
            }

            // Gcash
            if ($("input[name='mop']:checked").val() == 0) {
                if ($('#gcash_transaction_number').val() == '') {
                    console.log('trans');
                    return 'Transaction ID is required';
                }
            }

            return true;
        }

        // function getReservations(start_date, end_date, ) {
        //         $.ajax({
        //             type: "GET",
        //             url: "/api/customer/reservations",
        //             // url: "?start_date=2022-09-30&end_date=2022-10-01"
        //             processData: true,
        //             data: {
        //                 start_date: start_date,
        //                 end_date: end_date,
        //             },
        //             success: function(response) {
        //                 if (response.success == true) {
        //                     console.log(response.data);
        //                     // alert('Order Place Successfully.');
        //                     // let cartRoute = {!! json_encode(route('customer-cart')) !!};
        //                     // window.location.replace(cartRoute);
        //                     // return true;
        //                 }
        //                 alert('Something went wrong.');
        //                 return false;
        //             }
        //         });
        //     }

        function showPicker(ele) {
            $(ele).datepicker('show');
        }

        function checkMealTimeAvailability(date) {
            const reservedDates = {!! json_encode($reserved_dates) !!};
            let checked = {
                'lunch': false,
                'dinner': false,
            };
            if (reservedDates['reservedElevenAm'][date] == undefined) {
                $('#meal_time_lunch').prop("disabled", false);
            } else {
                // available
                checked.lunch = true;
                $('#meal_time_lunch').prop("disabled", true);
            }

            if (reservedDates['reservedSixPm'][date] == undefined) {
                $('#meal_time_dinner').prop("disabled", false);
            } else {
                // available
                checked.dinner = true;
                $('#meal_time_dinner').prop("disabled", true);
            }

            if (checked.lunch == true) {
                $("#meal_time_lunch").prop('checked', true);
            } else if (checked.dinner == true) {
                $("#meal_time_dinner").prop('checked', true);
            }
        }

        function setConfirmationModal() {
            const formData = getFormData();
            $('#confirm_name').text(formData['name']);
            $('#confirm_contact_no').text(formData['mobile_no']);
            $('#confirm_email_address').text(formData['email_address']);
            $('#confirm_mode_of_payment').text(formData['mop']);
            $('#confirm_gcash_transaction_number').text(formData['gcash_transaction_number_string']);
            $('#confirm_reservation_date').text(formData['reservation_date_string']);
            $('#confirm_meal_time').text(formData['meal_time_string']);
            $('#confirm_total').text('PHP 5000.00');
        }

        // assigning
        function getFormData() {
                let name = $('#r_name').val();
                let mobile_no = $('#r_mobile').val();
                let email_address = $('#r_email').val();

                let note = 'Testing'; // todo: sarah
                let mode_of_payment = document.querySelector('input[name="mop"]:checked').value;
                let reservation_date = ($(".datePicker").datepicker('getDate'))
                let meal_time = document.querySelector('input[name="meal_time"]:checked').value;
                let gcash_transaction_number = $('#gcash_transaction_number').val();
                let gcash_transaction_number_string = '';
                let mop = 'GCASH';
                let meal_hour = '11:00:00';
                let order_type = 2; // RESERVATION


                if (mode_of_payment == 0) {
                    mop = 'GCASH';
                    gcash_transaction_number_string = gcash_transaction_number;
                } else {
                    mop = 'Cash';
                    gcash_transaction_number_string = 'N/A';
                }


                if (meal_time == 1) {
                    meal_time_string = 'Lunch (11:00 AM - 2:00 PM)';
                    meal_hour = '11:00:00';
                } else {
                    meal_time_string = 'Dinner (6:00 PM - 9:00 PM)';
                    meal_hour = '18:00:00';
                }


                var date = new Date(reservation_date)
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const reservation_date_string = [year, month, day].join('-');
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };


                let reservation_date_ymdhis = reservation_date_string + ' ' + meal_hour; // Y-m-d H:i:s

                return {
                    name: name,
                    mobile_no: mobile_no,
                    email_address: email_address,
                    mode_of_payment: mode_of_payment,
                    mop: mop,
                    reservation_date: reservation_date,
                    meal_time: meal_time,
                    meal_time_string: meal_time_string,
                    gcash_transaction_number: gcash_transaction_number,
                    gcash_transaction_number_string: gcash_transaction_number_string,
                    reservation_date_string: date.toLocaleDateString("en-US", options),
                    reservation_date_ymdhis: reservation_date_ymdhis,
                    order_type: order_type
                }
            }
    </script>
@endsection
