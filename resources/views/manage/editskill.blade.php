@extends("layouts.Main")

@section("content")
<div class="edit flex flex-column h-full-vh hidden-overflow relative">
  
        <a href="{{ asset('/edit/skills') }}" class="btn btn-little backgroundColorPrimary"><i class="fa fa-chevron-left"></i> Back to Skills List</a>
        <h2 class="title">Edit My Works</h1>
        <form action="{{ asset('/edit/skill/{{ $skill->id }}') }}" method="post" enctype="multipart/form-data" class="w-full flex flex-column align-center">
            @csrf
            @method("put")
                <div class="input_box image  largeCard relative hidden-overflow mg-bottom transparentBackgroundColorPrimary">
                    <img src="{{ asset('storage/' . $skill->skillImage) }}"  class="imageCover"/>
                    <div class="options absolute top-left w-full h-full flex flex-column flex-center transparentBackgroundColorSecondary">
                        <label for="skillImage " class="btn cursor-pointer">Choose A Photo</label>
                        <input type="file" name="skillImage" id="skillImage" class="display-none" />
                    </div>
                </div>
                <div class="input_box flex flex-column">
                    <label for="skillName" class="title">Skill Name</label>
                    <input type="text" name="skillName" id="skillName" value="{{ $skill->skillName }}" class="transparentBackgroundColorTernary colorSecondary" />
                </div>
                <div class="input_box flex flex-column">
                    <label for="percent" class="title">Percent</label>
                    <input type="text" name="percent" id="percent" value="{{ $skill->percent }}" class="transparentBackgroundColorTernary colorSecondary" />
                </div>
                <button type="submit" class="btn btn-little btn-success cursor-pointer"><i class="fa fa-pencil"></i></button>
        </form>
    </div>
@endsection