<header class="header w-full-vh h-90-px flex justify-right align-center">
    <!-- <div class="logo flex flex-center display-none">
        <img src="{{ asset('/assets/banner_bg.svg') }}" alt="Logo" />
    </div> -->
    <i class="toggler menu_open fa fa-bars font-2x"></i>
    <div class="links fixed top-right h-full-vh index-2x hidden-overflow">
        <i class="toggler menu_close fa fa-times absolute font-2x colorSecondary "></i>
        <nav class="flex flex-column">
            <a href="{{ asset('/') }}" class="transparentBtn w-full">Home</a>
            <a href="{{ asset('/whoami') }}" class="transparentBtn w-full">Who Am I</a>
            <a href="{{ asset('/skills') }}" class="transparentBtn w-full">Skills</a>
            <a href="{{ asset('/works') }}" class="transparentBtn w-full">My Works</a>
        </nav>
        <div class="nav_cta flex flex-center relative flex-column">
            <a href="{{ asset('/getintouch') }}" class="gradient-text font-2x cursor-pointer">Get In Touch</a>
            @auth
                <form action="{{ asset('/logout') }}" method="post">
                    @csrf
                    <button type="submit" class="gradient-text font-2x cursor-pointer">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>