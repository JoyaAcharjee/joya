<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ URL::to('dashboard')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>

                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            @if(Session::has('userrole') && Session:: get('userrole') == 'admin')
                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Employees
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a> -->
                <!-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link" href="{{ URL::to('employees') }}">All Employees</a>
                        <a class="nav-link" href="{{ URL::to('create-employee') }}">Create Employee</a>
                    </nav>
                </div> -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Sessions" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Sessions
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="Sessions" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ URL::to('session') }}">All Sessions</a>
                        <a class="nav-link" href="{{ URL::to('create-session') }}">Create Session</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#section" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Section
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="section" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ URL::to('section') }}">All Section</a>
                        <a class="nav-link" href="{{ URL::to('create-section') }}">Create Section</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage student
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="student" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ URL::to('student') }}">All student</a>
                        <a class="nav-link" href="{{ URL::to('create-student') }}">Create student</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subject" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Subject
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="subject" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ URL::to('subject') }}">All Subject</a>
                        <a class="nav-link" href="{{ URL::to('create-subject') }}">Create Subject</a>
                    </nav>
                </div>
                
            @endif
            @if(Session::has('userrole') && Session:: get('userrole') == 'student')
                
                
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subject" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Enroll
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="subject" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ URL::to('enroll') }}">Requested Subject</a>
                        <a class="nav-link" href="{{ URL::to('create-enroll') }}">Request Subject</a>
                    </nav>
                </div>
                
            @endif
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as: {{ Session::get('username')}} </div>
<!-- {{--        @if(Session::has('userrole') && Session:: get('userrole') == 'admin')--}}
{{--            <p>Admin</p>--}}
{{--        @endif--}}
{{--        @if(Session::has('userrole') && Session:: get('userrole') == 'student')--}}
{{--            <p>Student</p>--}}
{{--        @endif--}} -->

    </div>
</nav>


