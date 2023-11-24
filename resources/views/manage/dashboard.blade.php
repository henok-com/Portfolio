@extends("layouts.Main")

@section("content")

<div class="dashboard h-full-vh hidden-overflow relative">
    <h1 class="title">Dashboard</h1>
    <div class="choice flex flex-column align-center">
        <a href="{{ asset('/edit/whoami') }}" class="colorSecondary card w-90 h-90-px flex flex-center"><h3>Edit Who am I</h3></a>
        <a href="{{ asset('/edit/skills') }}" class="colorSecondary card w-90 h-90-px flex flex-center"><h3>Edit Skills</h3></a>
        <a href="{{ asset('/edit/works') }}" class="colorSecondary card w-90 h-90-px flex flex-center"><h3>Edit My Works</h3></a>
    </div>
</div>

@endsection("content")