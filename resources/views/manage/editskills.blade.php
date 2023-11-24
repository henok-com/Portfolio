@extends("layouts.Main")

@section("content")
<div class="skills_list flex flex-column w-full h-full-vh hidden-overflow relative">
 
    <a href="{{ asset('/dashboard') }}" class="btn btn-little backgroundColorPrimary"><i class="fa fa-chevron-left"></i> Back to Dashboard</a>
    @empty( $skills->all())
        <p>There is no skill listed</p>
    @endempty
    @foreach($skills as $skill)
        <div class="skill flex h-70-px align-center">
            <img src="{{ asset('/assets/Bullet.svg') }}" alt="Bullet">
            <img src="{{ asset('storage/' . $skill->skillImage) }}" alt="{{ $skill->skillName }}" class="skill_img w-60-px  imageCover hidden-overflow">
            <div class="skill_detail">
                <p class="title bold-font">{{ $skill->skillName }}</p>
                <div class="progress w-full backgroundColorTernary relative hidden-overflow">
                    <div class="progressThumb"></div>
                </div>
                <p class="percent colorPrimary">{{ $skill->percent }}</p>
            </div>
        </div>
        <div class="skillOption flex">
            <a href="{{ asset('/edit/skill/$skill->id') }}" class="btn font-1x cursor-pointer btn-little"><i class="fa fa-pencil"></i></a>
            <form action="{{ asset('/delete/skill/ $skill->id ') }}" method="post">
                @csrf
                @method("delete")
                <button type="submit" class="btn font-1x cursor-pointer btn-little btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
        
    @endforeach
    <a href="/create/skill" class="btn font-1x btn-success">Add Skill</a>
</div>
@endsection