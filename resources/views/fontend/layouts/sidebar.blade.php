<!-- Sidebar -->		
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            {{-- <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level"></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>PHÒNG BAN</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('top_page')}}">
                                    <span class="sub-item">Tất cả phòng ban</span>
                                </a>
                            </li>
                            @foreach ($departments as $department)                                  
                            <li>
                                <a href="{{route('top_page_by_department', ['id' => $department->id])}}">
                                    <span class="sub-item">{{$department->name}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                @if (Auth::user()->role->id == 3)
                <li class="nav-item">
                    <a href="{{route('table_data_users')}}">
                        <i class="fas fa-users"></i>
                        <p>MANAGEMENT</p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{route('changepass')}}">
                        <i class="fas fa-key" aria-hidden="true"></i>
                        <p>CHANGE PASS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form1').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>LOGOUT</p> 
                    </a>
					<form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
<!-- End Sidebar -->