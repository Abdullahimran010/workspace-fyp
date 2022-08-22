<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left text-center d-none d-lg-block">
        <a href="{{ route('manager.dashboard') }}">
{{--            <img style="width:200px" src="{{asset('assets/images/logo/logo2.png')}}">--}}
            <h4 style="color: white; text-align: center">Efficient Task Allocation System</h4>
        </a>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle" src="{{auth('manager')->user()->getAvatarPath()}}" alt="#"></div>
            <h6 class="mt-3 f-14">{{auth('manager')->user()->name}}</h6>
{{--            <h6 class="mt-2 f-14">Manager</h6>--}}
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="{{route('manager.dashboard')}}"><i
                        data-feather="grid"></i><span>Dashboard</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->

