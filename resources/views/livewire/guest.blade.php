
<div>
    <div class="container">
        <div class="row">
            <a href="{{url('/event')}}">Back</a>
            
            <div class="col">
                <h3 class="text-danger">Guest Addings</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <h3>{{$event['eventTitle']}}</h3>
            </div>
            <div class="col-9">
                <div class="row justify-content-between">
                    <div class="col-2">
                        <button wire:click="clear" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Create Record
                        </button>
                    </div>
                    <div class=" col-8 mb-3">
                        <input type="email" wire:model='search' placeholder="Search" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img  src="{{asset('assets/img/peso_logo.png')}}" class="card-img-top" />
                    <div class="card-body">
                        <div class="bg-primary">
                            <h3 class="text-center">Analytics</h3>
                        </div>
                        <div>
                            <ul>
                                <li class="text-danger">Total Guest : {{$totalCount}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <table class="table" id="printTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Control Number</th>
                        <th scope="col">Action</th>
                        <th scope="col">QR Code</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($guests as $guest)
                      <tr class="justify-content-centerj">
                        <th scope="row">{{$index++}}</th>
                        <td>{{$guest['address'].'.'.' '. $guest['fname'].' '.$guest['mname'].' '.$guest['lname']}}</td>
                        <td>{{$guest['serialNum']}}</td>
                        <td>     
                            <button class="btn btn-primary"  data-bs-toggle="modal" wire:click.prevent="selectThis('{{$guest['gustId']}}')" data-bs-target="#editModal">Edit</button>

                            <button class="btn btn-danger"  data-bs-toggle="modal" wire:click.prevent="selectThis('{{$guest['gustId']}}')" data-bs-target="#deleteModal">Delete</button>
                            {{-- <button class="btn btn-danger" wire:click.prevent="selectThis('{{$guest['gustId']}}')"   data-bs-target="#deleteModl">Delete</button> --}}
                            <button class="btn btn-secondary" data-bs-toggle="modal"  wire:click.prevent="view('{{$guest['gustId']}}')" data-bs-target="#viewModal">View</button>
                            @if($guest['plusOneStatus']==0)
                            <button wire:click="clear" wire:click.prevent="selectThis1('{{$guest['gustId']}}')" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                plus one
                            </button>
                            @endif

                        </td>
                        <td>
                            <div>
                            {!!  QrCode::size(100)->generate('https://pesowebsite.000webhostapp.com/guest_view.php?ctr_numb='.$guest['serialNum']) !!}                  
                            </div>
                            <span class="">
                                {{$guest['serialNum']}} 
                            </span>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New Guest</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">First Name</label>
                            <input type="text" wire:model='fname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Midle Initials</label>
                            <input type="text" wire:model='mname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Last Name</label>
                            <input type="text" wire:model='lname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Name Adress</label>
                            <input type="text" wire:model='address' name="personel" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Department</label>
                            <input type="text" wire:model='dept' name="personel" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Award</label>
                            <input type="text" wire:model='award' name="email" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
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
    <div wire:ignore.self class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Plus One </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">First Name</label>
                            <input type="text" wire:model='fname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Midle Initials</label>
                            <input type="text" wire:model='mname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Last Name</label>
                            <input type="text" wire:model='lname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Name Address</label>
                            <input type="text" wire:model='address' name="personel" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="saveAsPlusOne()">Save</button>
            </div>
        </div>
        </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Guest Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong> Full Name </strong></label>
                            <label for="formGroupExampleInput" class="form-label"> {{$address.' '.$fname.' '.$mname.' '.$lname}}</label>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong> Award </strong></label>
                            <label for="formGroupExampleInput" class="form-label"> {{$award}}</label>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong> Department </strong></label>
                            <label for="formGroupExampleInput" class="form-label"> {{$dept}}</label>
                        </div>

                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label"><strong> Control Nummber </strong></label>
                            <label for="formGroupExampleInput" class="form-label"> {{$serialNum}}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3>Plus One</h3>
                    @if(!empty($plusOne))
                        @foreach ($plusOne as $item)
                        <div class="col">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label"><strong> Full Name </strong></label>
                                <label for="formGroupExampleInput" class="form-label"> {{$item->address.'.'.' '. $item->fname.' '.$item->$mname.' '.$item->lname}}</label>
                            </div>
                            <button class="btn btn-primary"  data-bs-toggle="modal" wire:click.prevent="selectThis2('{{$item->pOID}}')" data-bs-target="#editModal1">Edit</button>
                        </div>
                        @endforeach
                    @endif
                </div>
    
             </div>
        </div>
        </div>
    </div>
    
    <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Company</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Guest <strong> </strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" wire:click.prevent="deleteThis()">Yes</button>
            </div>
        </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Guest</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">First Name</label>
                            <input type="text" wire:model='fname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Midle Initials</label>
                            <input type="text" wire:model='mname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Last Name</label>
                            <input type="text" wire:model='lname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Name Adress</label>
                            <input type="text" wire:model='address' name="personel" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Department</label>
                            <input type="text" wire:model='dept' name="personel" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Award</label>
                            <input type="text" wire:model='award' name="email" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                        </div>        
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="saveEdit()">Save</button>
            </div>
        </div>
        </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="editModal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New Guest</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">First Name</label>
                            <input type="text" wire:model='fname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Midle Initials</label>
                            <input type="text" wire:model='mname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Last Name</label>
                            <input type="text" wire:model='lname' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Name Address</label>
                            <input type="text" wire:model='address' name="personel" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="saveEdit1()">Save</button>
            </div>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Guest?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Are you sure you want to delete this Hour <strong> {{$hour}} </strong> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteAs()">Yes</button>
                </div>
            </div>
            </div>
        </div>
</div>
<script>
    function printData(){
        var divToPrint=document.getElementById("printTable");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
        
    }
        $('button').on('click',function(){
        window.printData();
    })
</script>