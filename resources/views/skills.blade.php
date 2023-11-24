@extends("layouts.Main")

@section("content")
<div class="skills flex flex-column align-center h-full-vh hidden-overflow relative">
    <div class="skills_banner h-half-vh w-full hidden-overflow flex flex-center">
        <img src="{{ asset('/assets/skill.svg') }}" alt="Skills" class="w-90">
    </div>
    <h1 class="title">Skills</h1>
    <div class="skills_list flex flex-column w-full">
        @foreach($skills as $skill)
            <div class="skill flex h-70-px align-center">
                <img src="{{ asset('/assets/Bullet.svg') }}" class="w-10" alt="Bullet">
                <img src="{{ asset('storage/' . $skill->skillImage) }}" alt="{{ $skill->skillName }}" class="skill_img w-60-px  imageCover hidden-overflow">
                <div class="skill_detail">
                    <p class="title bold-font">{{ $skill->skillName }}</p>
                    <div class="progress w-full backgroundColorTernary relative hidden-overflow">
                        <div class="progressThumb colorSecondary"></div>
                    </div>
                    <p class="percent title">{{ $skill->percent }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection("content")
