<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left text-center d-none d-lg-block">
        <a href="{{ route('admin.dashboard') }}">
{{--            <img style="width:200px" src="{{asset('assets/images/logo/logo2.png')}}">--}}
            <h4 style="color: white; text-align: center">Efficient Task Allocation System</h4>
        </a>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle" src="{{auth('admin')->user()->getAvatarPath()}}" alt="#"></div>
            <h6 class="mt-3 f-14">{{auth('admin')->user()->name}}</h6>
{{--            <h6 class="mt-2 f-14">Admin</h6>--}}
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="{{route('admin.dashboard')}}"><i
                        data-feather="grid"></i><span>Dashboard</span></a>
            </li>
            @if(auth('admin')->user()->isAdmin == 1)
                <li><a class="sidebar-header" href="{{ route('admin.subadmin.index') }}"><i
                            data-feather="user-check"></i><span>Sub Admins</span></a>
                </li>
            @else
            @endif
            <li><a class="sidebar-header" href="{{ route('managers.index') }}"><i
                        data-feather="users"></i><span>Managers</span></a>
            </li>
            <li><a class="sidebar-header" href="{{ route('departments.index') }}"><i
                        data-feather="layers"></i><span>Departments</span></a>
            </li>
            <li><a class="sidebar-header" href="{{ route('projects.index') }}"><i
                        data-feather="file-text"></i><span>Projects</span></a>
            </li>
            <li><a class="sidebar-header" href="{{ route('adminTasks.index') }}"><i
                        data-feather="check-square"></i><span>Tasks</span></a>
            </li>
            <li><a class="sidebar-header" href="{{('chart.index')}}"><i
                        data-feather="layers"></i><span>Charts</span></a>
            </li>
            


        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->

