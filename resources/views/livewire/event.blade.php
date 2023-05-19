<div>
    @include('layouts.headerAdmin')

    <div class="container ">        
        <div class="row">
            <div class="col ">            
                <!-- Modal -->
                <h3>Event Detailed</h3>
                <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <div>
                                <svg fill="#000000" width="38px" height="38px" viewBox="0 0 24 24" id="create-note-alt" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><path id="secondary" d="M19.44,8.22C17.53,10.41,14,10,14,10s-.39-4,1.53-6.18a3.49,3.49,0,0,1,.56-.53L18,4l.47-1.82A8.19,8.19,0,0,1,21,2S21.36,6,19.44,8.22Z" style="fill: rgb(44, 169, 188); stroke-width: 2;"></path><path id="primary" d="M19.44,8.22C17.53,10.41,14,10,14,10s-.39-4,1.53-6.18a3.49,3.49,0,0,1,.56-.53L18,4l.47-1.82A8.19,8.19,0,0,1,21,2S21.36,6,19.44,8.22ZM14,10l-2,2" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M12,3H4A1,1,0,0,0,3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V12" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
                            </div>
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">New Events</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    {{-- {{$photo}} --}}
                                    <div class="form-floating mb-3">
                                        <input type="text" id="name" wire:model='eventTitle' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                                        <label for="name">Table Name</label>
                                    </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click.prevent="save()">Save</button>
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
            {{-- <div class="col">
                <div class="card" style="width: 18rem;">
                    <img  src="{{asset('img/Picsart_23.png')}}" class="card-img-top" />
                    <div class="card-body">
                        <div class="bg-primary text-white p-1 ">
                            <h3 class="text-center">Upcoming Event</h3>
                        </div>
                        <div class="m-3">
                            <ol>
                                @foreach($datas as $data)
                                    <li>
                                       <strong> {{ $data['eventTitle']}} </strong>
                                        <ul>
                                            <li class="text-secondary">
                                                {{\Carbon\Carbon::parse($data['eventDate'])->format('F d Y') 
                                                }}
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                        
                    
                    </div>
                </div>
            </div> --}}
            <div class="col-12 ">
                <div class="row justify-content-between">
                    <div class="col-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Create Record
                        </button>
                    </div>
                    <div class="col-2">
                        <a target="_blank" href="{{URL('PDFREPORT')}}" type="button" class="btn btn-primary">
                            View PDF
                        </a>
                    </div>
                    <div class=" col-8 mb-3">
                        <input type="email" wire:model='search1' placeholder="Search" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                    </div>
                </div>
                <div class="row  gap-3">
                    @foreach($results as $result)
                        <div class="card"  style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-title"><strong> {{$result->eventTitle}} </strong></p>
                                                  <button class="btn btn-success"  wire:click.prevent="edit('{{$result['eventId']}}')" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.15" d="M4 20H8L18 10L14 6L4 16V20Z" fill="#000000"/>
                                        <path d="M18 10L21 7L17 3L14 6M18 10L8 20H4V16L14 6M18 10L14 6" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    
                                </button>
                                <button class="btn btn-danger"  data-bs-toggle="modal" wire:click.prevent="select('{{$result['eventId']}}')" data-bs-target="#deleteModal">
                                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                </button>
                                <button class="btn btn-info" data-bs-toggle="modal" wire:click.prevent="viewAs('{{$result['eventId']}}')" data-bs-target="#viewModal">
                                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.1" fill-rule="evenodd" clip-rule="evenodd" d="M16.8494 7.05025C14.1158 4.31658 9.6836 4.31658 6.94993 7.05025L4.82861 9.17157C3.49528 10.5049 2.82861 11.1716 2.82861 12C2.82861 12.8284 3.49528 13.4951 4.82861 14.8284L6.94993 16.9497C9.6836 19.6834 14.1158 19.6834 16.8494 16.9497L18.9707 14.8284C20.3041 13.4951 20.9707 12.8284 20.9707 12C20.9707 11.1716 20.3041 10.5049 18.9707 9.17157L16.8494 7.05025ZM12.0002 8.75C10.2053 8.75 8.75019 10.2051 8.75019 12C8.75019 13.7949 10.2053 15.25 12.0002 15.25C13.7951 15.25 15.2502 13.7949 15.2502 12C15.2502 10.2051 13.7951 8.75 12.0002 8.75Z" fill="#323232"/>
                                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#323232" stroke-width="2"/>
                                        <path d="M6.94975 7.05025C9.68342 4.31658 14.1156 4.31658 16.8492 7.05025L18.9706 9.17157C20.3039 10.5049 20.9706 11.1716 20.9706 12C20.9706 12.8284 20.3039 13.4951 18.9706 14.8284L16.8492 16.9497C14.1156 19.6834 9.68342 19.6834 6.94975 16.9497L4.82843 14.8284C3.49509 13.4951 2.82843 12.8284 2.82843 12C2.82843 11.1716 3.49509 10.5049 4.82843 9.17157L6.94975 7.05025Z" stroke="#323232" stroke-width="2" stroke-linejoin="round"/>
                                        </svg>
                                </button>
                                <button  wire:click.prevent="goTo('{{$result['eventId']}}')"  class="btn btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach 
                {{$results->links()}}   

            </div>
    
        </div>

            </div>
        <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <div>
                        <svg width="38px" height="38px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" fill="white" fill-opacity="0.01"/>
                            <path d="M42 26V40C42 41.1046 41.1046 42 40 42H8C6.89543 42 6 41.1046 6 40V8C6 6.89543 6.89543 6 8 6L22 6" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 26.7199V34H21.3172L42 13.3081L34.6951 6L14 26.7199Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linejoin="round"/>
                            </svg>
                    </div>
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- {{$name}} --}}
                    <div class="col">
                        {{-- {{$photo}} --}}
                        <div class="form-floating mb-3">
                            <input type="text" id="name" wire:model='eventTitle' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                            <label for="name">Table Name</label>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Event <strong> {{$eventTitle}} </strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteAs()">Yes</button>
                </div>
            </div>
            </div>
        </div>

        </div>
        <!-- Button trigger modal -->
        <div wire:ignore.self class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-image: {{asset('storage/'.$result->image)}};">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">View Event</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            @if(!empty($eventTitle))
                              <h5 class="card-title">{{$eventTitle}}</h5>
                            @endif
                              <span>Guest List</span>
                            {{-- {{$this->geust['mname']}} --}}
                            @foreach($guest as $result)
                                <ul>
                                    <li>{{$result->fname.' '.$result->mname.' '.$result->lname}}</li>
                                </ul>
                            @endforeach 

                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

