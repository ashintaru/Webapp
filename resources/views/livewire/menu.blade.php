<div>
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
        <div class="card d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white shadow-lg">
            <a href="#offcanvasExample" role="button" aria-controls="offcanvasExample" data-bs-toggle="offcanvas"
               class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 d-none d-sm-inline text-dark">
                    <strong class="text-danger">PESO</strong> Menu
                </span>
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-house"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/job')}}" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i>
                        <span class="ms-1 d-none d-sm-inline">Job</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/company')}}" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i>
                        <span class="ms-1 d-none d-sm-inline">Company</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('events')}}" class="nav-link px-0 align-middle ">
                        <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Events</span></a>
                </li>
            </ul>
            <hr>
        </div>
    </div>
    
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
