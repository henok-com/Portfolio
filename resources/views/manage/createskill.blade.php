@extends("layouts.Main")

@section("content")
<div class="edit flex flex-column h-full-vh hidden-overflow relative">
        <a href="{{ asset('/edit/skills') }}" class="btn btn-little backgroundColorPrimary"><i class="fa fa-chevron-left"></i> Back to Skills List</a>
        <h2 class="title">Edit My Works</h1>
        <form action="{{ asset('/create/skill') }}" method="post" enctype="multipart/form-data" class="w-full flex flex-column align-center">
            @csrf
                <div class="input_box flex flex-column ">
                    <label for="skillImage" class="btn font-1x cursor-pointer">Upload Skill Image</label>
                    <input type="file" name="skillImage" id="skillImage" class="display-none" />
                </div>
                <div class="input_box flex flex-column">
                    <label for="skillName" class="title">Skill Name</label>
                    <input type="text" name="skillName" id="skillName" value="{{ old('skillName') }}" class="transparentBackgroundColorTernary colorSecondary" placeholder="Enter Skill Name"/>
                </div>
                <div class="input_box flex flex-column">
                    <label for="percent" class="title">Percent</label>
                    <input type="text" name="percent" id="percent" value="{{ old('skillName') }}" class="transparentBackgroundColorTernary colorSecondary" placeholder="Enter Skill Percent" />
                </div>
                <button type="submit" class="btn btn-little cursor-pointer btn-success">Create Skill</button>
        </form>
    </div>
@endsection