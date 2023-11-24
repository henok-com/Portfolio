@extends("layouts.Main")

@section("content")
<div class="whoami grid h-full-vh hidden-overflow relative">
    
    <div class="user_pic flex flex-center hidden-overflow w-80 relative">
        <img src="{{ asset('/assets/Diamond_bg.svg') }}" class="whoami_illustration w-full" />
        <img src="{{ asset('storage/' . $bio_image) }}" alt="Habteyes Muluneh" class="whoami_img absolute position-center" />
    </div>
    <div class="whoami_text w-full">
        <h1 class="title font-half2x">Who am I <span>?</span></h1>
        <p class="font-1x">
            I'M Habteyes Muluneh. <br />
            {{ $bio ?? ""  }}
        </p>
    </div>
</div>
<!-- I am Skilled Cinematographer, Photographer, Videographer.  -->
@endsection("content")