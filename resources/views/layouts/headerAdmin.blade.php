<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid " >
        <div class="row text-wrap " >
            <span class="" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="width: 150px;"><b class="text-danger"> PESO </b>CABUYAO </span>
            <small class="">Public Employment Service Office</small>   
        </div>
        {{-- <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>    --}}
        </div>
    </nav>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><b class="text-danger"> PESO </b>Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div>
            <a class="dropdown-item" href="{{URL('home')}}">Dashboard</a>
            <a class="dropdown-item" href="{{URL('job')}}">Job Management</a>
            <a class="dropdown-item" href="{{URL('event')}}">Event Management</a>
            <a class="dropdown-item" href="{{URL('message')}}">Message</a>
        </div> 

        
    </div>
    <a class="dropdown-item text-danger" href="{{URL('logout')}}">Log Out</a>
</div>
