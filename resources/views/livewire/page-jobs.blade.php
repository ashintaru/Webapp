<div>
  @include('layouts.header')
    <link rel="stylesheet" href="{{asset('assets/css/frontpagecss.css')}}">
     <div class="container mt-5 text-center">
        <div class="row">
            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </span>
                    <input type="text" name="search" wire:model='search' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-6">
                <select wire:model='loc' class="form-select" aria-label="Default select example">

                  {{-- @php


                      use App\Models\location;
                      
                      $locations = location::all();
                  @endphp --}}
                  
                    @if($locations!=null)
                        <option selected>Open this select location</option>
                        @foreach($locations as $location)
                            <option value='{{$location->locId}}'>{{$location->locName}}</option>
                        @endforeach
                    @endif
                
                </select>
            </div>
    </div>
    </div>
    <div class="container mt-5">
        <div class="ag-courses_box">
          {{-- @php
              use App\Models\job;

              $lists = job::all();
          @endphp --}}
            @if($lists!=null)
                @foreach($lists as $list) 
                    <div class="ag-courses_item">
                        <a href="#" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>
                
                        <div class="ag-courses-item_title">
                            {{$list['jobTitle']}}
                        </div>
                        <div>
                            <p style="font-size: 20px; font-weight: bold;">Company Name: {{$list['CompName']}}</p>
                            <p style="font-size: 20px; font-weight: bold;">Company Address: {{$list['compAdd']}}</p>
                        </div>
                        <div>
                            <p>
                                Objectives 
                                {{$list['objective']}}
                            </p>
                            <p>
                                Requirements <br>

                                {{$list['requirement']}}
                            </p>
                        </div>
                        <div class="ag-courses-item_date-box">
                            Start:
                            <span class="ag-courses-item_date">
                            {{$list['dateCreated']}}
                            </span>
                        </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p>
                        No result Found
                </p> 

            @endif   
        </div>
    </div>
</div>
<style>
    .ag-format-container {
  width: 1142px;
  margin: 0 auto;
}
.ag-courses_box {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;

  padding: 50px 0;
}
.ag-courses_item {
  -ms-flex-preferred-size: calc(33.33333% - 30px);
  flex-basis: calc(33.33333% - 30px);

  margin: 0 15px 30px;

  overflow: hidden;

  border-radius: 28px;
}
.ag-courses-item_link {
  display: block;
  padding: 30px 20px;
  background-color: #121212;

  overflow: hidden;

  position: relative;
}
.ag-courses-item_link:hover,
.ag-courses-item_link:hover .ag-courses-item_date {
  text-decoration: none;
  color: #FFF;
}
.ag-courses-item_link:hover .ag-courses-item_bg {
  -webkit-transform: scale(10);
  -ms-transform: scale(10);
  transform: scale(10);
}
.ag-courses-item_title {
  min-height: 87px;
  margin: 0 0 25px;

  overflow: hidden;

  font-weight: bold;
  font-size: 30px;
  color: #FFF;

  z-index: 2;
  position: relative;
}
.ag-courses-item_date-box {
  font-size: 18px;
  color: #FFF;

  z-index: 2;
  position: relative;
}
.ag-courses-item_date {
  font-weight: bold;
  color: #f9b234;

  -webkit-transition: color .5s ease;
  -o-transition: color .5s ease;
  transition: color .5s ease
}
.ag-courses-item_bg {
  height: 128px;
  width: 128px;
  background-color: #f9b234;

  z-index: 1;
  position: absolute;
  top: -75px;
  right: -75px;

  border-radius: 50%;

  -webkit-transition: all .5s ease;
  -o-transition: all .5s ease;
  transition: all .5s ease;
}
.ag-courses_item:nth-child(2n) .ag-courses-item_bg {
  background-color: #3ecd5e;
}
.ag-courses_item:nth-child(3n) .ag-courses-item_bg {
  background-color: #e44002;
}
.ag-courses_item:nth-child(4n) .ag-courses-item_bg {
  background-color: #952aff;
}
.ag-courses_item:nth-child(5n) .ag-courses-item_bg {
  background-color: #cd3e94;
}
.ag-courses_item:nth-child(6n) .ag-courses-item_bg {
  background-color: #4c49ea;
}



@media only screen and (max-width: 979px) {
  .ag-courses_item {
    -ms-flex-preferred-size: calc(50% - 30px);
    flex-basis: calc(50% - 30px);
  }
  .ag-courses-item_title {
    font-size: 24px;
  }
}

@media only screen and (max-width: 767px) {
  .ag-format-container {
    width: 96%;
  }

}
@media only screen and (max-width: 639px) {
  .ag-courses_item {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%;
  }
  .ag-courses-item_title {
    min-height: 72px;
    line-height: 1;

    font-size: 24px;
  }
  .ag-courses-item_link {
    padding: 22px 40px;
  }
  .ag-courses-item_date-box {
    font-size: 16px;
  }
}
</style>