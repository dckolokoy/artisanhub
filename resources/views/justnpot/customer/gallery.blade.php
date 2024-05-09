<!-- Start Gallery -->
<div class="gallery-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Gallery</h2>
                </div>
            </div>
        </div>
        <div class="tz-gallery">
            <div class="row">
                @foreach ($data['gallery'] as $galleryItems => $items)
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <a class="lightbox" href="{{ asset($items['image']) }}">
                            <img class="img-fluid" src="{{ asset($items['image']) }}" alt="Gallery Images"
                                style="width: 350px; height: 250px;">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Gallery -->
