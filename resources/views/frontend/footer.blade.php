
<div class="container" id="protfolio">
    <div class="d-flex justify-content-center button-group filter-button-group ">
            <button data-filter="*" class="active">show all</button>
        @foreach ($categories as $category)
            <button data-filter=".{{ $category->slug }}">{{ $category->category_name }}</button>
        @endforeach
    </div>
    <div class="row">
        @foreach ($protfolio_info as $protfolio)
            @php
                $category_slug = App\Models\category::where('id', $protfolio->category_id)->value('slug');
            @endphp

            <div class="col-sm-6 col-md-3 grid-item {{ $category_slug }}">
                <a href="{{ asset('upload/protfolio_image') }}/{{ $protfolio->protfolio_image }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                     <img src="{{ asset('upload/protfolio_image') }}/{{ $protfolio->protfolio_image }}" alt="" srcset=""></a>
            </div>
        @endforeach

     </div>
     <div class="d-flex justify-content-center m-3 p-2">
        {{ $protfolio_info->links('pagination::bootstrap-5') }}
    </div>
</div>




<!-- ======= protfolio end ======= -->
<!-- ======= Footer ======= -->
{{-- <footer id="footer" class="mt-5">


    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Baker</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/baker-free-onepage-bootstrap-theme/ -->
                Development by <a href="https://arifurrahmanrifat29112002.github.io/portfolio_ARR/"> <strong>Arifur
                        Rahman Rifat</strong></a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            @if (!$user_info->value('facebook') == null)
                <a href="{{ $user_info->value('facebook') }}" class="facebook"><i class="bx bxl-facebook"></i></a>
            @endif

            @if (!$user_info->value('twitter') == null)
                <a href="{{ $user_info->value('twitter') }}" class="twitter"><i class="bx bxl-twitter"></i></a>
            @endif

            @if (!$user_info->value('instagram') == null)
                <a href="{{ $user_info->value('instagram') }}" class="instagram"><i
                        class="bx bxl-instagram"></i></a>
            @endif

            @if (!$user_info->value('linkdin') == null)
                <a href="{{ $user_info->value('linkdin') }}" class="linkdin"><i class="bx bxl-linkedin"></i></a>
            @endif

            @if (!$user_info->value('youtube') == null)
                <a href="{{ $user_info->value('youtube') }}" class="youtube"><i class="bx bxl-youtube"></i></a>
            @endif
            @if (!$user_info->value('behance') == null)
                <a href="{{ $user_info->value('behance') }}" class="behance"><i class="bx bxl-behance"></i></a>
            @endif
        </div>
    </div>
</footer><!-- End Footer --> --}}


