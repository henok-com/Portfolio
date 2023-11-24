@extends("layouts.Main")

@section("content")
<div class="getintouch flex flex-column align-center h-full-vh relative hidden-overflow">
    <h1 class="title">Get In Touch</h1>
    <form action="{{ asset('/send') }}" method="post" class="w-80">
        @csrf
        <div class="input_box flex flex-column">
            <label for="name" class="colorTernary">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your Name Here"  class="transparentBackgroundColorTernary colorSecondary"/>
        </div>
        @error("name")
            <p>{{ $message }}</p>
        @enderror
        <div class="input_box flex flex-column">
            <label for="email" class="colorTernary">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email Here" class="transparentBackgroundColorTernary colorSecondary" />
        </div>
        @error("email")
            <p>{{ $message }}</p>
        @enderror
        <div class="input_box flex flex-column">
            <label for="message" class="colorTernary">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your Message Here" class="transparentBackgroundColorTernary colorSecondary mg-bottom"></textarea>
        </div>
        @error("message")
            <p>{{ $message }}</p>
        @enderror
        <x-main-btn name="submit" text="Send" type="submit" />
    </form>
</div>
@endsection("content")