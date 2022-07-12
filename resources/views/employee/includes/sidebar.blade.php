<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="{{route('employee.index')}}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">HOME</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

                    {{-- <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 3 </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="{{route('employee.statistics')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Statistics</span></a>
                    </li>


                    @role('super_admin')
                      <li>
                        <a href="{{route('admin.department.index')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">departments</span></a>
                    </li>
                    @endrole

                    @role('super_admin')
                    <li>
                      <a href="{{route('admin.department.create')}}" class="nav-link px-0 align-middle">
                          <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Add department</span></a>
                   </li>
                    @endrole

                    <li>
                        <a href="{{route('employee.profile.edit')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Edit profile</span></a>
                    </li>
                    @role('super_admin|admin')
                    <li>
                      <a href="{{route('admin.all.employees')}}" class="nav-link px-0 align-middle">
                          <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">All employees</span></a>
                  </li>
                  @endrole

                  @role('super_admin|admin')
                  <li>
                    <a href="{{route('admin.all.statistics')}}" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">All statistics</span></a>
                </li>
                @endrole


                @role('super_admin')
                <li>
                  <a href="{{route('statSearch.index')}}" class="nav-link px-0 align-middle">
                      <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">stats search</span></a>
              </li>
              @endrole



                @role('super_admin')
                <li>
                  <a href="{{route('admin.index')}}" class="nav-link px-0 align-middle">
                      <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">All Admins</span></a>
              </li>
              @endrole

              @role('super_admin')
              <li>
                <a href="{{route('add.admin')}}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Add Admin</span></a>
            </li>
            @endrole

                </ul>
                <hr>

            </div>
        </div>
        <div class="col py-3">
           @yield('content')
        </div>
    </div>
</div>
