@extends('justnpot.customer-main')
@section('title', 'Login')
@section('content')

    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Login </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Contact -->
    <div class="contact-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form action="loginck.php" method="post">
                        <table border="0" align="center" cellpadding="5" cellspacing="7">
                            <tr align="right">
                            <td> <img src="{{ asset('justnpot/images/login.png') }}" style="width: 30%"> <br>
                                    <a href="{{ route('register')}}"> New User?</a>
                                </td>
                            </tr>
                            <tr>
                                <td> Username </td>
                                <td> <input type="text" name="uid" placeholder="Enter username"
                                        style="padding: 10px; width: 150%"> <br> </td>

                            </tr>
                            <tr>
                                <td> Password</td>
                                <td> <input type="Password" name="pass" placeholder="Enter Password"
                                        style="padding: 10px; width: 150%"> <br> </td>
                            </tr>
                            <tr>
                                <td align="right"> <input type="submit" name="" value="Login Now"
                                        style="color: red; background-color: #8b0000; font-size: 1.5em; font-family: Calibri;">
                                </td>
                            </tr>
                    </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
@stop
