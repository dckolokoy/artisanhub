@extends('justnpot.customer-main')
@section('title', 'Contact Us')
@section('content')

    <!-- Start Contact -->
    <div class="container" style="margin-top: 150px; margin-bottom: 100px">
        <div class="row">
            <div class="col-md-6 ">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.834506522645!2d120.9939145148405!3d14.608501589797457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6027f8ffda9%3A0xfce662d35360a45e!2s1626%20J.%20Fajardo%2C%20Sampaloc%2C%20Manila%2C%201008%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1662655335305!5m2!1sen!2sph"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="contact-box col-md-6 p-0">
                <div class="container">
                    <div class="row pb-0">
                        <div class="col-lg-12">
                            <div class="heading-title mt-5">
                                <h2>Contact Us</h2>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span
                                                    style="color: tomato; font-size: 1.3em; text-align: left; "><b>Email
                                                        Us :</b> justnpotrestobar@gmail.com</span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span
                                                    style="color: tomato; font-size: 1.3em; text-align: left; "><b>Mobile
                                                        :</b> +639 9492 3423</span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span
                                                    style="color: tomato; font-size: 1.3em; text-align: left; "><b>Location
                                                        :</b> Sampaloc, Manila, Philippines</span>
                                            <div cbg2lass="help-block with-errors"></div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
@stop
