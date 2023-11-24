@extends("layouts.Main")

@section("content")
<div class="portfolio w-full h-full-vh hidden-overflow relative">
    <h1 class="title">My Works</h1>
    <div class="works grid grid-center w-full ">
        @foreach($images as $image)
            <div class="work largeCard hidden-overflow relative">
                <img src="{{ asset('storage/' . $image->imagePath) }}" alt="Img" class="workImg imageCover"/>
                <div class="view absolute w-full h-full top-left flex align-center">
                    <x-main-btn text="View" type="normal" id="view" class="view" />
                </div>
            </div>
        @endforeach
        <div class="modal fixed top-left w-full-vw h-full-vh transparentBackgroundColorPrimary flex flex-center">
            <i class="fa fa-times font-2x colorSecondary absolute cursor-pointer close_modal"></i>
            <img src="" />
        </div>
    </div>
</div>
@endsection("content")