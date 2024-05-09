@extends('justnpot.customer-main')
@section('title', 'About Us')
@section('content')
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1> About Us</h1>
                </div>
            </div>
        </div>
    </div>
    @include('justnpot.customer.about')
    @include('justnpot.customer.menu')
@stop
