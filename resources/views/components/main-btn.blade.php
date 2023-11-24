<div class="primaryBtn flex flex-center relative position-horizontal-center index-1x relative">
    <img src="{{ asset('/assets/Camera.svg') }}" alt="Camera Icon"/>
    @if($type == "link")
        <a class="btn relative cursor-pointer" href={{$link}}> {{ $text }}</a>
    @elseif($type == "normal")
        <button  class="btn relative cursor-pointer" id={{$id}}>{{$text}}</button>
    @elseif($type == "submit")
        <input class="btn relative cursor-pointer" type="submit" name={{$name}} value={{$text}} />
    @endif
</div>