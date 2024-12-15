@extends('frontend.layouts.frontend_master')

@section('title', 'All Branch')

@section('content')
<!-- ========================= branch-section start ========================= -->
<section class="about-section pt-150 pb-5">
    <div class="container">
        <div class="row">
            {{-- @foreach ($branches as $branch) --}}
            <div class="col-lg-4">
                <div class="about-content">
                    <div class="section-title">
                        <h1 class="wow fadeInUp" data-wow-delay=".4s"></h1>
                    </div>
                    <div class="counter-up wow fadeInUp" data-wow-delay=".8s">
                        <div class="py-3">
                            <h5 class="text-light">Phone: </h5>
                            <h5 class="text-light">Email: </h5>
                            <h5 class="text-light">Address: </h5>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
</section>
<!-- ========================= branch-section end ========================= -->
@endsection
