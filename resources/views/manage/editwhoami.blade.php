@extends("layouts.Main")

@section("content")
    <div class="edit flex flex-column h-full-vh hidden-overflow relative"> 
        <a href="{{ asset('/dashboard') }}" class="btn btn-little backgroundColorPrimary mg-bottom"><i class="fa fa-chevron-left"></i> Back to Dashboard</a>
        <div class="editor_cont flex flex-column">
            <div class="biography">
                <h2 class="title">Edit Biography</h2>
                <form action="{{ asset('/edit/updateWhoami') }}"  method="post" class="w-full flex flex-center">
                    @csrf
                    @method("put")
                    <div class="input_box flex flex-column align-center w-90">
                        <textarea name="bio" id="bio" cols="30" rows="20" class="transparentBackgroundColorTernary colorSecondary w-full font-1x">{{ $bio_text }}</textarea>
                        <button type="submit" class="btn cursor-pointer"><i class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>
        <div class="biography_img">
            <h2 class="title">Edit Biography Image</h2>
                <form action="{{ asset('/edit/updateWhoami') }}" method="post" enctype="multipart/form-data" class="flex justify-center">
                    @csrf
                    @method("put")
                    <div class="input_box image largeCard relative hidden-overflow mg-bottom cursor-pointer">
                        <img src="{{ asset('storage/' . $bio_image) }}" class="imageCover"/>
                        <div class="options absolute top-left w-full h-full flex flex-column flex-center transparentBackgroundColorSecondary cursor-pointer">
                            <label for="bio_image" class="btn cursor-pointer">Choose Image</label>
                            <input type="file" name="bio_image" id="bio_image"  class="display-none" />
                            <button type="submit" class="btn cursor-pointer"><i class="fa fa-upload"></i></button>
                        </div>
                    </div>
                </form>
        </div>
        </div>
    </div>
@endsection