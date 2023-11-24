@extends("layouts.Main")

@section("content")
    <a href="{{ asset('/dashboard') }}" class="btn btn-little backgroundColorPrimary"><i class="fa fa-chevron-left"></i> Back to Dashboard</a>
    <div class="portfolio flex flex-column flex-full {{ $images->all() == [] ? 'flex-center' : 'align-center' }} h-full-vh hidden-overflow relative">
    <div class="background absolute top-left">
                <div class="blur fixed top-left w-full h-full-vh transparentBackgroundColorFourth"></div>
                <div class="circleLime" style="--i: 1"></div>
                <div class="circleSun" style="--i: 2"></div>
                <div class="circleBlue" style="--i: 3"></div>
                <div class="circleBlack" style="--i: 4"></div>
            </div>    
        <h1 class="title">Edit My Works</h1>
        @empty($images->all())
            <h1 class="title">There is no works listed</h1>
        @endempty
        <div class="works grid grid-center w-full">
        @foreach($images as $image)
            <div class="input_box image largeCard relative hidden-overflow mg-bottom transparentBackgroundColorPrimary">
                <img src="{{ asset('storage/' . $image->imagePath) }}" class="imageCover" />
                <div class="options absolute top-left w-full h-full flex flex-column flex-center transparentBackgroundColorSecondary">
                    <form action="{{ asset('/edit/work/$image->id') }}" method="post" enctype="multipart/form-data" class="flex flex-column flex-center" >
                        @csrf
                        @method("put")
                        <label for="work_image{{$image->id}}" class="btn btn-little cursor-pointer">Select Photo</label>
                        <input type="file" name="work_image" id="work_image{{$image->id}}" class="cursor-pointer display-none" />
                        <button type="submit" class="btn cursor-pointer btn-little"><i class="fa fa-upload"></i></button>
                    </form>
                    <form action="{{ asset('/delete/work/$image->id ') }}" method="post">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn cursor-pointer btn-little"><i class="fa fa-trash"></i></button> 
                    </form>
                </div>
            </div>
        @endforeach
        </div>
        <form action="{{ asset('/create/work') }}" method="post" enctype="multipart/form-data" class="flex align-end flex-wrap">
            @csrf
            <input type="file" name="work_image" id="new_work_image" class="display-none" />
            <label for="new_work_image" class="btn cursor-pointer">Select Photo</label>
            <button type="submit" class="btn btn-little cursor-pointer btn-success"><i class="fa fa-plus"></i>Add Work</button>
        </form>
    </div>
@endsection