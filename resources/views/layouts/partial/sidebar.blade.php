<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a class=" " href="{{url('/')}}" aria-expanded="false"><i class="fa fa-tachometer"></i> Dashboard</a>

                </li>
                <li class="nav-label">Apps</li>
                @can('member menu')
                <li> <a class="" href="{{url('members')}}" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu"> Members</span></a></li>
                @endcan
                @can('collection menu')
                <li> <a class="" href="{{url('collections')}}" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu"> Collections</span></a></li>
                @endcan
                @can('report menu')
                <li> <a class="" href="{{url('reports')}}" aria-expanded="false"><i class="fa fa-bar-chart-o"></i><span class="hide-menu"> Report</span></a></li>
                @endcan



                <li class="nav-label">EXTRA</li>


                @hasrole('Admin')
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('users')}}">Users</a></li>
                        <li><a href="{{url('roles')}}">Roles</a></li>
                        <li><a href="{{url('permissions')}}">Permissions</a></li>

                    </ul>
                </li>
                @endhasrole
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Documents</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">How to use</a></li>

                        <li> <a class="has-arrow" href="#" aria-expanded="false">Videos</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">item 1.3.1</a></li>
                                <li><a href="#">item 1.3.2</a></li>
                                <li><a href="#">item 1.3.3</a></li>
                                <li><a href="#">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->