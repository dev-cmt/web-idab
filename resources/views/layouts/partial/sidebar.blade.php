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
            
            @canany('Member')
            <li>
                <a href="{{ route('dashboard-gallery.all')}}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-picture"></i><span class="nav-text">Gallery</span>
                </a>
            </li>
            @endcanany

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">Member</span>
                </a>
                <ul aria-expanded="false">
                    @foreach ($memberType as $item)
                        <li><a href="{{Route('member.index', $item->id )}}">{{$item->name}} </a></li>
                    @endforeach
                    @canany('Super-Admin')
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Member Approve</a>
                        <ul aria-expanded="false">
                            <li><a href="{{Route('members-approve.index')}}">Member Approve</a></li>
                        </ul>
                    </li>
                    @endcanany
                    
                    @canany('Admin')
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Data Setting</a>
                        <ul aria-expanded="false">
                            @canany('Gallery access','Gallery add','Gallery edit','Gallery delete')
                                <li><a href="{{Route('memebr-type.index')}}">Add Member Types</a></li>
                                <li><a href="{{Route('memebr-qualification.index')}}">Add Qualification</a></li>
                            @endcanany
                        </ul>
                    </li>
                    @endcanany
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-003-diamond"></i>
                    <span class="nav-text">My Transactions</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ Route('transaction-annual.index')}}">Annual Fee</a></li>
                    <li><a href="{{ Route('transaction-event.index')}}">Event Fee</a></li>
                </ul>
            </li>

            @canany('Super-Admin')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-database"></i>
                    <span class="nav-text">Payment History</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{Route('transaction-annual-approve.index')}}">Annual Fee Details</a></li>
                    <li><a href="{{Route('transaction-event-approve.index')}}">Event Fee Details</a></li>
                    <li><a href="{{Route('transaction-registation-approve.index')}}">Registation Fee Details</a></li>
                    @canany('Admin')
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Data Setting</a>
                        <ul aria-expanded="false">
                            {{-- @canany('Payment add','Payment edit','Payment delete') --}}
                            <li><a href="{{Route('transaction-payment-number.index')}}">Setup Payment Number</a></li>
                            {{-- @endcanany --}}
                            <li><a href="{{Route('transaction-payment-fees.index')}}">Setup Payment Fee</a></li>
                        </ul>
                    </li>
                    @endcanany
                </ul>
            </li>
            @endcanany

            @canany('Super-Admin')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-pad"></i>
                    <span class="nav-text">Post</span>
                </a>
                <ul aria-expanded="false">
                    @canany('Gallery access','Gallery add','Gallery edit','Gallery delete')
                        <li><a href="{{ Route('gallery.index')}}">Photo Gallery</a></li>
                    @endcanany
                    <li><a href="{{route('event.index')}}">Manage Events</a></li>
                </ul>
            </li>
            @endcanany

            @canany('Super-Admin')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    @canany('Role access','Role add','Role edit','Role delete')
                    <li><a href="{{route('contact-us.index')}}">Contact Us</a></li>
                    @endcanany

                    @canany('Role access','Role add','Role edit','Role delete')
                        <li><a href="{{ route('roles.index') }}">Manage Role</a></li>
                    @endcanany

                    @canany('User access','User add','User edit','User delete')
                    <li><a href="{{ Route('users.index')}}">Manage User</a></li>
                    @endcanany
                    
                </ul>
            </li>
            @endcanany


            @canany('Super-Admin')
            <li>
                <a href="{{ route('subscription.index')}}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-147-medal"></i><span class="nav-text">Subscription</span>
                </a>
            </li>
            @endcanany

        </ul>
        <div class="copyright py-4 my-4">
            {{-- <p><strong>Pune Club</strong><!-- © 2023 All Rights Reserved--></p>
            <p class="fs-12">Made with <span class="heart"></span> by <a href="http://www.iconisl.com/"><img src="{{asset('public/frontend')}}/images/icon.png" alt="Icon Information Systems Ltd." style="width:30px;"></a></p> --}}
        </div>
    </div>

    <!--**********************************
                Sidebar end
    ***********************************-->