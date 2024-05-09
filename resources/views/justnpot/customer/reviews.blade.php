<!-- Start Customer Reviews -->
@php
    $reviewConstants = [
        1 => 'Very Poor',
        2 => 'Poor',
        3 => 'Good',
        4 => 'Excellent',
    ];
@endphp

@if (count($data['reviews']) > 0)
<div class="customer-reviews-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Customer Reviews</h2>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-8 mr-auto ml-auto text-center">
                <div id="reviews" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner mt-4">
                        @foreach ($data['reviews'] as $review)
                            @if ($loop->first)
                                <div class="carousel-item text-center active ">
                                @else
                                    <div class="carousel-item text-center  ">
                            @endif
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle"
                                    src="{{ url('justnpot/images/menu/quotations-button.png') }}" alt="">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">
                                    {{ $review['name'] ?? 'Anonymous' }}
                                </strong></h5>
                            <h6 class="text-dark m-0">Rating : {{$reviewConstants[$review['rating']] ?? ''}} | {{ $review['rating']}} / 5  </h6>
                            <p class="m-0 p-3">
                                Review : {{ $review['review'] }}
                            </p>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End Customer Reviews -->
@endif

