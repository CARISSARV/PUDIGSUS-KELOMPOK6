@foreach($data as $row)
<div class="col-lg-8">
    <div class="portfolio-details-slider swiper">
        <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide">
                <iframe src="{{ asset('storage/' . $row->file) }}#toolbar=0" style="width: 100%; height: 100vh;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
@endforeach

