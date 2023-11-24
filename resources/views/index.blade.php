@extends("layouts.Main")
@section("content")
    <div class="home_banner h-full-vh flex flex-column flex-center hidden-overflow relative ">   
    <div class="banner_img relative flex flex-center hidden-overflow relative w-full">
            <img src="{{ asset('/assets/banner_illustration.svg') }}" alt="Banner Illustration" class="portfolio_illustration w-full absolute" />
            <img src="{{ asset('/assets/img1.png') }}" alt="Portfolio Img" class="portfolio_img absolute  imageCover position-center" />
        </div>
        <div class="banner_text  " style="min-height: 30vh;">
            <h1 class="title font-half2x">Hello<span>,</span> Every Body</h1>
            <div class="intro">
                <p class="font-2x">
                    I'M Habteyes Muluneh<br />
                    I am a Cinematographer
                </p>
                <p class="light-font font-half1x">Do you wanna know more about me?</p>
            </div>
            <x-main-btn text="Let's Go" type="link" link="{{ asset('/whoami') }}" />
        </div>
    </div>
@endsection("content")