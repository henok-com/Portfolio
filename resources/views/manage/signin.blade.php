@extends("layouts.Main")

@section("content")
<div class="signin flex flex-column align-center h-full-vh hidden-overflow relative">

    <h1 class="title">Sign In</h1>
    <form action="{{ asset('/signin') }}" method="post" class="w-80">
        @csrf
        <div class="input_box flex flex-column">
            <label for="uname" class="colorTernary">Username</label>
            <input type="text" id="uname" name="uname" placeholder="Enter your Username Here" class="transparentBackgroundColorTernary colorSecondary"/>
        </div>
        <div class="input_box flex flex-column">
            <label for="pass"  class="colorTernary">Password</label>
            <div class="password_input relative w-full flex align-center mg-bottom">
                <input type="password" id="pass" name="pass" placeholder="Enter your Password Here" class="transparentBackgroundColorTernary colorSecondary passwordField w-full"/>
                <button type="button" class="showPassword absolute cursor-pointer"><i class="fa fa-eye"></i></button>
            </div>
        </div>
        <x-main-btn name="submit" text="SignIn" type="submit" />
    </form>
</div>
@endsection("content")