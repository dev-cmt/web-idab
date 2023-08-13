
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between z-index">

        <!-- <h1 class="logo"><a href="index.html">Groovin</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html" class="logo"><img src="{{asset('public/frontend')}}/img/logo.png" alt="" class="img-fluid"></a>

        
        <nav id="navbar" class="navbar mb-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Why IDAB?</a></li>
                        <li><a href="#">Vision & Mission</a></li>
                        <li><a href="#">Objectives</a></li>
                        <li><a href="#">Why be a Member?</a></li>
                        <li><a href="#">Membership Requirements</a></li>
                        <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Committee</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Ad Hoc Committee</a></li>
                        <li><a href="#">Executive Committee</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Members</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Student member</a></li>
                        <li><a href="#">Candidate member</a></li>
                        <li><a href="#">Professional member</a></li>
                        <li><a href="#">Associate member</a></li>
                        <li><a href="#">Corporate member</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto " href="#portfolio">Events</a></li>
                <li><a class="nav-link scrollto" href="{{Route('page.contact')}}">Contact</a></li>
                @guest
                    <li><a class="getstarted scrollto" href="{{Route('member_register.create')}}">Become A Member</a></li>
                @endguest
                @auth
                <li class="dropdown"><a href="#" class="getstarted scrollto"><span>{{Auth::user()->name}}</span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @if (Auth::user()->is_admin == "1" && Auth::user()->status == "1")
                            <li><a href="{{ Route('profile_show', auth()->user()->id )}}">Profile</a></li>
                        @endif
                        @if (Auth::user()->is_admin == "0" && Auth::user()->status == "0")
                            <li><a href="{{ Route('register-payment.create') }}">Payment Fee</a></li>
                        @endif
                        @if (Auth::user()->is_admin == "1" && Auth::user()->status == "0")
                            <li><a href="{{ Route('member-approve.padding') }}">Waiting Approval</a></li>
                        @endif
                        
                        <form method="POST" action="{{ Route('logout') }}">
                            @csrf
                            <li><a href="{{ Route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a></li>
                        </form>
                    </ul>
                </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->