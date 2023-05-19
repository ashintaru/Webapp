<div>
    @include('layouts.headerAdmin')
    <div class="container ">     
        <div class="row">
            <div class="col ">            
                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <div>
                                <svg fill="#000000" width="38px" height="38px" viewBox="0 0 24 24" id="create-note-alt" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><path id="secondary" d="M19.44,8.22C17.53,10.41,14,10,14,10s-.39-4,1.53-6.18a3.49,3.49,0,0,1,.56-.53L18,4l.47-1.82A8.19,8.19,0,0,1,21,2S21.36,6,19.44,8.22Z" style="fill: rgb(44, 169, 188); stroke-width: 2;"></path><path id="primary" d="M19.44,8.22C17.53,10.41,14,10,14,10s-.39-4,1.53-6.18a3.49,3.49,0,0,1,.56-.53L18,4l.47-1.82A8.19,8.19,0,0,1,21,2S21.36,6,19.44,8.22ZM14,10l-2,2" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M12,3H4A1,1,0,0,0,3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V12" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
                            </div>
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Job</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        {{-- <input type="text" id="name" wire:model='hour' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> --}}
                                        @if($hours != null )
                                                <select id="hour" wire:model="hour" class="form-select" aria-label="Default select example" name="hour">
                                                    @foreach($hours as $hour)
                                                        <option value="{{$hour['hourId']}}">{{$hour['hourName']}}</option>
                                                    @endforeach
                                                </select>
                                        @endif
                                        <label for="hour">Hour</label>
                                        @error('hour')
                                            <span class="text-small text-danger">
                                                {{'*'.$message}}   
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        {{-- <input type="text" id="name" wire:model='hour' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> --}}
                                        @if($types != null )
                                                <select id="hour" wire:model="type" class="form-select" aria-label="Default select example" name="hour">
                                                    @foreach($types as $type)
                                                        <option value="{{$type['typeId']}}">{{$type['typeName']}}</option>
                                                    @endforeach
                                                </select>
                                        @endif
                                        <label for="hour">Job Type</label>
                                        @error('type')
                                            <span class="text-small text-danger">
                                                {{'*'.$message}}   
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        {{-- <input type="text" id="name" wire:model='hour' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> --}}
                                        @if($companies != null )
                                                <select id="hour" wire:model="company" class="form-select" aria-label="Default select example" name="hour">
                                                    @foreach($companies as $company)
                                                        <option value="{{$company['compID']}}">{{$company['CompName']}}</option>
                                                    @endforeach
                                                </select>
                                        @endif
                                        <label for="hour">Company Name</label>
                                        @error('company')
                                            <span class="text-small text-danger">
                                                {{'*'.$message}}   
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        {{-- <input type="text" id="name" wire:model='hour' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> --}}
                                        @if($categories != null )
                                                <select id="hour" wire:model="category" class="form-select" aria-label="Default select example" name="hour">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category['categoryId']}}">{{$category['jobTitle']}}</option>
                                                    @endforeach
                                                </select>
                                        @endif
                                        <label for="hour">Job Position </label>
                                        @error('category')
                                            <span class="text-small text-danger">
                                                {{'*'.$message}}   
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        @if($locations != null )
                                        <select id="hour" wire:model="location" class="form-select" aria-label="Default select example" name="hour">
                                            @foreach($locations as $location)
                                                <option value="{{$location['locId']}}">{{$location['locName']}}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                        <label for="hour">Location </label>
                                        @error('location')
                                            <span class="text-small text-danger">
                                                {{'*'.$message}}   
                                            </span>
                                        @enderror                                    
                                    </div>      
                                </div>
                                
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <textarea wire:model="req" maxlength="1000" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                                        <label for="floatingTextarea2">Requirements</label>
                                        <div id="the-count">
                                            @error('req')
                                                <span class="text-small text-danger">
                                                    {{'*'.$message}}   
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <textarea wire:model="obj" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                                        <label for="floatingTextarea2">objective</label>
                                        @error('obj')
                                            <span class="text-small text-danger">
                                                {{'*'.$message}}   
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click.prevent="store()">Save</button>
                        </div>
                    </div>
                    </div>
                </div>
        
            </div>
            <!-- Button trigger modal -->
        </div>
        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                    </svg>
                    <strong>{{session('message')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                    <strong>{{session('error')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col">
                <div class="card border-primary" style="width: 18rem;">
                    <div class="card-body">
                        <div class="bg-primary text-white p-1 ">
                            <h3 class="text-center">Configuration</h3>
                        </div>
                        <div class="m-3">
                            <a class="dropdown-item" href="{{URL('type')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-blockquote-left" viewBox="0 0 16 16">
                                    <path d="M2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm5 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm-5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm.79-5.373c.112-.078.26-.17.444-.275L3.524 6c-.122.074-.272.17-.452.287-.18.117-.35.26-.51.428a2.425 2.425 0 0 0-.398.562c-.11.207-.164.438-.164.692 0 .36.072.65.217.873.144.219.385.328.72.328.215 0 .383-.07.504-.211a.697.697 0 0 0 .188-.463c0-.23-.07-.404-.211-.521-.137-.121-.326-.182-.568-.182h-.282c.024-.203.065-.37.123-.498a1.38 1.38 0 0 1 .252-.37 1.94 1.94 0 0 1 .346-.298zm2.167 0c.113-.078.262-.17.445-.275L5.692 6c-.122.074-.272.17-.452.287-.18.117-.35.26-.51.428a2.425 2.425 0 0 0-.398.562c-.11.207-.164.438-.164.692 0 .36.072.65.217.873.144.219.385.328.72.328.215 0 .383-.07.504-.211a.697.697 0 0 0 .188-.463c0-.23-.07-.404-.211-.521-.137-.121-.326-.182-.568-.182h-.282a1.75 1.75 0 0 1 .118-.492c.058-.13.144-.254.257-.375a1.94 1.94 0 0 1 .346-.3z"/>
                                  </svg>
                                Type</a>
                            <a class="dropdown-item" href="{{URL('hour')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                    <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                  </svg>
                                Hour</a>
                            <a class="dropdown-item" href="{{URL('company')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z"/>
                                  </svg>
                                Company</a>
                            <a class="dropdown-item" href="{{URL('category')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                    <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
                                  </svg>
                                Category</a>
                            <a class="dropdown-item" href="{{URL('location')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                  </svg>
                                Location
                            </a> 
                        </div>
                    </div>
                </div>
                <br>
                <div class="card text-white bg-secondary mb-3" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Numbers Of Post Job</h5>
                      <p class="card-text h3 text-white ">{{$jobCount}}</p>
                    </div>
                </div>
                <br>
                <div class="card text-white bg-primary mb-3" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Numbers Of Active Job</h5>
                      <p class="card-text h3 text-white ">{{$positive}}</p>
                    </div>
                </div>
                <br>
                <div class="card text-white bg-danger mb-3" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Numbers Of In-Active Job</h5>
                      <p class="card-text h3 text-white ">{{$negative}}</p>
                    </div>
                </div>
                
            </div>
            <div class="col-9 ">
                <div class="row justify-content-between">
                    <div class="col-2">
                        <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Create Record
                        </button>
                    </div>
                    <div class=" col-8 mb-3">
                        <input type="email" wire:model='search1' placeholder="Search" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                    </div>
                </div>
                <div class="row  gap-3">
                    <table class="table table-light table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Job Title</th>
                              <th scope="col">Company</th>
                              <th scope="col">Date Created</th>
                              <th scope="col">Date Updated</th>
                              <th scope="col">status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if($jobs!=null)
                                @foreach($jobs as $job)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$job['jobTitle']}}</td>
                                        <td>{{$job['CompName']}}</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($job['dateCreated'])->format('M-d-Y')}}
                                        </td>
                                        <td>
                                            {{\Carbon\Carbon::parse( $job['dateUpdated'])->diffForHumans()}}
                                        </td>
                                        <td>
                                            @if($job['status']==1)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                              </svg>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-success"  wire:click.prevent="select('{{$job['jobId']}}')" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.15" d="M4 20H8L18 10L14 6L4 16V20Z" fill="#000000"/>
                                                    <path d="M18 10L21 7L17 3L14 6M18 10L8 20H4V16L14 6M18 10L14 6" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                
                                            </button>
                                            <button class="btn btn-danger"  data-bs-toggle="modal" wire:click.prevent="select('{{$job['jobId']}}')" data-bs-target="#deleteModal">
                                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                          </tbody>
                    </table>
            </div>
        </div>

            </div>
        <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <div>
                        <svg width="38px" height="38px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" fill="white" fill-opacity="0.01"/>
                            <path d="M42 26V40C42 41.1046 41.1046 42 40 42H8C6.89543 42 6 41.1046 6 40V8C6 6.89543 6.89543 6 8 6L22 6" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 26.7199V34H21.3172L42 13.3081L34.6951 6L14 26.7199Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linejoin="round"/>
                            </svg>
                    </div>
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Job</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- {{$name}} --}}
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                {{-- <input type="text" id="name" wire:model='hour' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> --}}
                                @if($hours != null )
                                        <select id="hour" wire:model="hour" class="form-select" aria-label="Default select example" name="hour">
                                            @foreach($hours as $hour)
                                                <option value="{{$hour['hourId']}}">{{$hour['hourName']}}</option>
                                            @endforeach
                                        </select>
                                @endif
                                <label for="hour">Hour</label>
                                @error('hour')
                                    <span class="text-small text-danger">
                                        {{'*'.$message}}   
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                {{-- <input type="text" id="name" wire:model='hour' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> --}}
                                @if($types != null )
                                        <select id="hour" wire:model="type" class="form-select" aria-label="Default select example" name="hour">
                                            @foreach($types as $type)
                                                <option value="{{$type['typeId']}}">{{$type['typeName']}}</option>
                                            @endforeach
                                        </select>
                                @endif
                                <label for="hour">Job Type</label>
                                @error('type')
                                    <span class="text-small text-danger">
                                        {{'*'.$message}}   
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                {{-- <input type="text" id="name" wire:model='hour' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> --}}
                                @if($companies != null )
                                        <select id="hour" wire:model="company" class="form-select" aria-label="Default select example" name="hour">
                                            @foreach($companies as $company)
                                                <option value="{{$company['compID']}}">{{$company['CompName']}}</option>
                                            @endforeach
                                        </select>
                                @endif
                                <label for="hour">Company Name</label>
                                @error('company')
                                    <span class="text-small text-danger">
                                        {{'*'.$message}}   
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                {{-- <input type="text" id="name" wire:model='hour' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> --}}
                                @if($categories != null )
                                        <select id="hour" wire:model="category" class="form-select" aria-label="Default select example" name="hour">
                                            @foreach($categories as $category)
                                                <option value="{{$category['categoryId']}}">{{$category['jobTitle']}}</option>
                                            @endforeach
                                        </select>
                                @endif
                                <label for="hour">Job Position </label>
                                @error('category')
                                    <span class="text-small text-danger">
                                        {{'*'.$message}}   
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                @if($locations != null )
                                <select id="hour" wire:model="location" class="form-select" aria-label="Default select example" name="hour">
                                    @foreach($locations as $location)
                                        <option value="{{$location['locId']}}">{{$location['locName']}}</option>
                                    @endforeach
                                </select>
                                @endif
                                <label for="hour">Location </label>
                                @error('location')
                                    <span class="text-small text-danger">
                                        {{'*'.$message}}   
                                    </span>
                                @enderror                                    
                            </div>      
                        </div>
                        
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <textarea wire:model="req" maxlength="1000" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                                <label for="floatingTextarea2">Requirements</label>
                                <div id="the-count">
                                    @error('req')
                                        <span class="text-small text-danger">
                                            {{'*'.$message}}   
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-check  form-switch">
                                <input class="form-check-input" wire:model='status' type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                @if($status == 1)
                                    <label class="form-check-label bg-text-primary" for="flexSwitchCheckDefault">Active</label>
                                @else
                                    <label class="form-check-label" for="flexSwitchCheckDefault">De active</label>
                                @endif
                            </div>    
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <textarea wire:model="obj" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                                <label for="floatingTextarea2">objective</label>
                                @error('obj')
                                    <span class="text-small text-danger">
                                        {{'*'.$message}}   
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="saveAs()">Save</button>
                </div>
            </div>
            </div>
        </div>    
    </div>
        <!-- Button trigger modal -->
        {{-- style="background-image: {{asset('storage/'.$result->image)}};" --}}
        <div wire:ignore.self class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">View Event</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="card mb-3">
                        {{-- <img src="{{asset('storage/'.$photo)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$eventTitle}}</h5>
                          <p class="card-text">{{$eventPlace}}</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div> --}}
                      </div>
                </div>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <div>
                        <svg width="38px" height="38px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 3H12H8C6.34315 3 5 4.34315 5 6V18C5 19.6569 6.34315 21 8 21H11M13.5 3L19 8.625M13.5 3V7.625C13.5 8.17728 13.9477 8.625 14.5 8.625H19M19 8.625V11.8125" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 16L17.5 18.5M20 21L17.5 18.5M17.5 18.5L20 16M17.5 18.5L15 21" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                    </div>
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Job</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Job?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteAs()">Yes</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
