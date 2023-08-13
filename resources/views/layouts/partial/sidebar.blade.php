    <!--**********************************
                Sidebar start
    ***********************************-->
    <div class="deznav scrollbar">
        <div class="main-profile">
            <div class="image-bx">
                <img src="{{asset('public')}}/images/profile/{{ Auth::user()->profile_photo_path }}" alt="">
                <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
            </div>
            <h5 class="name">{{Auth::user()->name}}</h5>
            <p class="email"><a href="mailto:<nowiki> {{Auth::user()->email}}" class="__cf_email__">[{{Auth::user()->email}}]</a></p>
        </div>
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="{{ route('dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Member</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">Member Approve</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Member List</a>
                        <ul aria-expanded="false">
                            @foreach ($memberType as $item)
                                <li><a href="#">{{$item->name}} </a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Data Setting</a>
                        <ul aria-expanded="false">
                            @canany('Gallery access','Gallery add','Gallery edit','Gallery delete')
                                <li><a href="{{Route('memebr-type.index')}}">Add Member Types</a></li>
                                <li><a href="#">Add Qualification</a></li>
                            @endcanany
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-003-diamond"></i>
                    <span class="nav-text">Transactions</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ Route('event_registation_list')}}">Annual Fee</a></li>
                    <li><a href="{{ Route('event_registation_list')}}">Event Register</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Money Receive</a>
                        <ul aria-expanded="false">
                            @canany('Gallery access','Gallery add','Gallery edit','Gallery delete')
                            <li><a href="#">Annual Fee</a></li>
                            <li><a href="#">Event Fee</a></li>
                            <li><a href="#">Registation Fee</a></li>
                            @endcanany
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Payment Setting</a>
                        <ul aria-expanded="false">
                            @canany('Gallery access','Gallery add','Gallery edit','Gallery delete')
                            <li><a href="#">Annual Fee</a></li>
                            <li><a href="#">Event Fee</a></li>
                            <li><a href="#">Registation Fee</a></li>
                            @endcanany
                        </ul>
                    </li>
                </ul>
            </li>



            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">App</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ Route('profile.show', Auth::user()->id) }}">Profile</a></li>
                    @canany('Setting access')
                    <li><a href="{{route('contact.index')}}">Contact Us</a></li>
                    @endcanany
                </ul>
            </li>
            
            <li><a href="{{ Route('layouts.gallery_image')}}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-063-picture"></i>
                    <span class="nav-text">Gallery</span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-003-diamond"></i>
                <span class="nav-text">Transactions</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ Route('event_registation_list')}}">Event Registation</a></li>
                </ul>
            </li>
            
            @canany('Member access')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
                    <span class="nav-text">Member</span>
                </a>
                <ul aria-expanded="false">
                    @canany('Role access','Role add','Role edit','Role delete')
                        <li><a href="{{ route('bv.advisor') }}">Adviser</a></li>
                        <li><a href="{{ route('bv.executive_committee') }}">Executive Committee</a></li>
                        <li><a href="{{ route('bv.welfare') }}">Pune Welfare Trust</a></li>
                        <li><a href="{{ route('bv.member_list') }}">Pune Member</a></li>
                    @endcanany
                </ul>
            </li>
            @endcanany

            @canany('Setting access')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">

                    @canany('User access','User add','User edit','User delete')
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Approve</a>
                        <ul aria-expanded="false">
                            @canany('Approve Member')
                                <li><a href="{{ route('member_register.index') }}">Member Approve</a></li>
                            @endcanany
                            @canany('Approve Member')
                                <li><a href="{{ Route('subscription_approve_list')}}">Subscription Fees</a></li>
                            @endcanany
                            @canany('Approve Member')
                                <li><a href="{{ Route('event_approve_list')}}">Event Fees</a></li>
                            @endcanany
                        </ul>
                    </li>
                    @endcanany

                    @canany('Role access','Role add','Role edit','Role delete')
                        <li><a href="{{ route('roles.index') }}">Role</a></li>
                    @endcanany

                    @canany('User access','User add','User edit','User delete')
                    <li><a href="{{ Route('users.index')}}">User</a></li>
                    @endcanany
                    
                </ul>
            </li>
            @endcanany

            @canany('Pages access')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-049-copy"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Gallery</a>
                        <ul aria-expanded="false">
                            @canany('Gallery access','Gallery add','Gallery edit','Gallery delete')
                                <li><a href="{{ Route('gallery.index')}}">Photo Gallery</a></li>
                            @endcanany
                            <!--<li><a href="page-error-403.html">Video Gallery</a></li>-->
                        </ul>
                    </li>
                    <li><a href="{{route('lose_member.index')}}">Lost Member</a></li>
                    <li><a href="{{route('event.index')}}">Manage Events</a></li>
                </ul>
            </li>
            @endcanany
            
            {{-- @canany('Setting access') --}}
            <li>
                <a href="{{ route('subscription.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-147-medal"></i><span class="nav-text">Subscription</span>
                </a>
            </li>
            {{-- @endcanany --}}

        </ul>
        <div class="copyright">
            <p><strong>Pune Club</strong><!-- © 2023 All Rights Reserved--></p>
            <p class="fs-12">Made with <span class="heart"></span> by <a href="http://www.iconisl.com/"><img src="{{asset('public/frontend')}}/images/icon.png" alt="Icon Information Systems Ltd." style="width:30px;"></a></p>
        </div>
    </div>
    <!--**********************************
                Sidebar end
    ***********************************-->