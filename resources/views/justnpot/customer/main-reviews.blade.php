@extends('justnpot.customer-main')
@section('title', 'Review')
@section('content')
    <!-- Start Contact -->

    <div class="contact-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center mt-5">
                        <h1>Our Main Goal is Customer Satisfaction</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                <form action="{{route('customer-review-submit')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                        required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Your Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="custom-select d-block form-control" id="guest" name="rev" required
                                        data-error="Please Select Person">
                                        <option value="5">Excellent</option>
                                        <option value="4">Good</option>
                                        <option value="3">Satisfactory</option>
                                        <option value="2">Poor</option>
                                        <option value="1">Very Poor</option>

                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Review" rows="4" name="desc"
                                        data-error="" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="submit-button text-center">
                                    <button name="sb" class="btn btn-common" id="submit" type="submit">Send Review</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<hr>
@include('justnpot.customer.reviews')
    <!-- End Contact -->

@stop
