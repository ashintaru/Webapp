
<div>
    @include('layouts.header')
    <link rel="stylesheet" href="{{asset('assets/css/frontpagecss.css')}}"> 
    <div class="wave">
        {{--        <img src="{{asset('assets/wow/wave.png')}}" alt="body" class="wavee">--}}
                <img src="{{asset('assets/img/bg4.png')}}" alt="body" class="wavee">
        
                <div class="textbox_container container">
                    <div class="row" id="search">
                        <div class="col-6"> 
        
        {{--                    <img src="{{asset('assets/wow/esop.png')}}" alt="esop" class="osep">--}}
                            <img src="{{asset('assets/img/Picsart_23.png')}}" alt="esop" class="osep">
        
                        </div>
                        <div class="col-6 ">
                            <h1>Find a Job</h1>
                            <p>
                                Explore which careers have the highest job satisfaction, best salaries, and more.
                            </p>
        
        {{--                    <input type="text" class="input1" placeholder="    Search Job">--}}
        {{--                    <br>--}}
        {{--                    <input type="text" class="input2" placeholder="    Location">--}}
        {{--                    <input type="button" class="btnSearch" value="Search">--}}
        {{--                    --}}
        
                            <form action="">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model='search' class="form-control" id="input1" placeholder="Search Job">
                                    <label for="input1">Search Job</label>
                                </div>
                                <div class="form-floating mb-3">
        {{--                            <input type="text" class="form-control" id="input2" placeholder="Location">--}}
        {{--                            <label for="input2">Location</label>--}}
                                    <select class="form-select" wire:model='loc' id="input2">
                                        @if($locations!=null)
                                           <option selected>Open this select location</option>
                                            @foreach($locations as $location)
                                                <option value='{{$location->locId}}'>{{$location->locName}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <label for="input2">Location</label>
                                </div>
                                <input type="button" wire:click.prevent="search()" class="btnSearch btn btn-light" value="Search">
                            </form>
        
        
                            <div class="pesologo"> 
                                <ul class="logos">
                                    <li>
                                        <p>
                                            <img src="{{asset('assets/img/peso_logo.png')}}" alt="peso" class="logo1">
                                            PESO Cabuyao
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <img src="{{asset('assets/wow/logo2.png')}}" alt="cabuyao" class="logo2">
                                            City of Cabuyao
                                        </p>
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/wow/logo3.png')}}" alt="bagongcabuyao" class="logo3">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        
        
           </div>
            <br><br><br><br><br>
            <div class=" jobpostingcontainer " id="list">
        
              <div class="container-fluid ">
                  <h1 class="" style="font-size: 55px; font-family: sans-serif; color: #2e6ca4"><b>Find a Job & Opportunities</b></h1>
        
                  <a href="#" class="" style="color: grey; font-size: 23px; text-decoration: none" >Read All Jobs</a>
        
              </div>
               <div class="card">
                <div class="container-fluid ">
                    <div class="cardContainer m-3">
                        <div class="row">  
                            @foreach($lists as $list) 
                            <div class="col-4">
                                <div class="cardItems">
                                    <div class="" style="display: flex; align-items: center;">
                                        <p style="font-size: 26px; font-weight: bolder;">{{$list['jobTitle']}}</p>
                                        <p style="margin-left: 150px; color: red;">new</p>
                                    </div>
                                    <p style="font-size: 20px; font-weight: bold;">Company Name: {{$list['CompName']}}</p>
                                    <p style="font-size: 20px; font-weight: bold;">Company Address: {{$list['compAdd']}}</p>
                                    <input type="text" value={{$list['typeName']}} style="background-color: #4472C4; opacity: 34%; color: white;">
                                    <input type="text" value={{$list['hourName']}} style="background-color: #C00000; opacity: 34%; color: white;">
                                    <br><br>
                                    <p>
                                        Objectives 
                                        {{$list['objective']}}
                                    </p>
                                    <p>
                                        Requirements <br>

                                        {{$list['requirement']}}
                                    </p>
                                    <p style="font-size: 12px; color: grey;">2 days post</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
               </div>
               
                <br><br>
              <div class="wave2container">
                <div style="position:absolute; right: 45%;">
                    {{$lists->links()}}
                </div>  
                   <img src="{{asset('assets/wow/wave2.png')}}" alt="wave2">
              </div>
        
             </div>
             <div class="mvpcontainer">
       
            
                  <div class="wave3container">
                       <img src="{{asset('assets/wow/wave3.png')}}" alt="wave3">
                  </div>
                  <div class="mvp">
                       <div>
                            <img src="{{asset('assets/wow/mission.png')}}" alt="mission">
                            <h1>MISSION</h1>
                            <br>
                            <p>
                                 Promote decent work in the Philippines <br>
                                 through policy and program <br>
                                 development based on timely and <br>
                                 accurate labor market information.
                            </p>
                       </div>
        
                       <div>
                            <img src="{{asset('assets/wow/vision.png')}}" alt="vision">
                            <h1>VISION</h1>
                            <br>
                            <p>
                                 Opportunities to full, decent, and <br>
                                 gainful employment for every <br>
                                 Filipino jobseeker in an enhanced <br>
                                 Philippine labor market.
        
                            </p>
                       </div>
                       <div>
                            <img src="{{asset('assets/wow/philosophy.png')}}" alt="philosophy">
                            <h1>PHILOSOPHY</h1>
                            <br>
                            <p>
                                 Encourage employers to submit <br>
                                 to the PESO on a regular basis a <br>
                                 lost of job vacancies in their <br>
                                 perspective establishments. <br>
        
                            </p>
                       </div>
                  </div>
        
             </div>
        
             <div class="footercontainer">
        
                  <div class="mapContainer" style="position: absolute; margin: 20px 0 0 50px ; width: 40%; height: 500px;">
                       <div>
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3866.5868710451373!2d121.12140001451291!3d14.277298888746014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d8604aa8f17d%3A0x4e0371b3a9d5540e!2sRetail%20Plaza%20City%20of%20Cabuyao!5e0!3m2!1sen!2sph!4v1676620143050!5m2!1sen!2sph"
                                   width="700" height="500" style="border:0;"
                                   allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
                       </div>
                  </div>
        
                  <div id="contact" class="contactusContainer" style="position: absolute; margin: 20px 0 0 50px ; width: 40%; height: 500px; right: 0;">
                       <div>
                            <img src="{{asset('assets/wow/contactUs.png')}}" alt="contactus" style="width: 400px; margin-left: 30px;">
                           <form action="">
                               <div class="form-floating mb-3">
                                   <input type="text" wire:model="name" class="form-control" id="floatingName" placeholder="Name: " style="width: 80%; height: 30%; border-radius: 5px; border: solid #2E6CA4;">
                                   <label for="floatingName">Name:</label>
                                   @error('name')
                                   <span class="text-small text-danger">
                                       {{'*'.$message}}   
                                   </span>
                               @enderror
                               </div>
                               <div class="form-floating mb-3">
                                   <input type="text" wire:model="email" class="form-control" id="floatingNumber" placeholder="Contact Number: " style="width: 80%; height: 30%; border-radius: 5px; border: solid #2E6CA4;">
                                   <label for="floatingNumber">Email</label>
                                   @error('email')
                                   <span class="text-small text-danger">
                                       {{'*'.$message}}   
                                   </span>
                               @enderror
                                </div>
                               <div class="form-floating mb-3">
                                   <textarea wire:model='comment' class="form-control" placeholder="Leave a comment here"
                                             style="border-radius: 5px; border: solid #2E6CA4; width: 80%; height: 130px"  id="floatingTextarea"></textarea>
                                   <label for="floatingTextarea">Comments</label>
                                   @error('comment')
                                   <span class="text-small text-danger">
                                       {{'*'.$message}}   
                                   </span>
                               @enderror
                                </div>
                               <input type="button" wire:click="messageSent()" value="send" style="background-color: #2E6CA4; position: absolute; right: 20%; width: 150px; height: 30px; border: none; border-radius: 5px; color: white;">
                           </form>
        
                       </div>
                  </div>
       
                  <div class="footer">
                   
                        <div class="aboutsContainer">
                            <div class="facebookContainer">
                                 <p class="">
        
                                     <a href="https://www.facebook.com/PESOCabuyaoCity/" class="text-white me-3"
                                        style="text-decoration: none" target=new>
                                         <img src="{{asset('assets/wow/fb.png')}}" alt="fb" class="facebook">
                                          Facebook
                                     </a>
                                     <a href="https://www.tiktok.com/@pesocabuyao" class="text-white me-3"
                                        style="text-decoration: none" target=new>
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                             <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                                         </svg>
                                          Tiktok
                                     </a>
                                     <a href="https://instagram.com/pesocabuyao2023?igshid=OTJINzQ0NWM=" class="text-white me-1"
                                        style="text-decoration: none" target=new>
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                             <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                         </svg>
                                          Instagram
                                     </a>
                                 </p>
                            </div>
                            <div class="contactContainer">
                                 <p>
                                      <img src="{{asset('assets/wow/contact.png')}}" alt="contact" class="contact">
                                      (049) 544 - 7354
                                 </p>
                            </div>
                        </div>
        
        
                        <div class="privacyContainer">
                            <div>
                                 <p>Privacy statement</p>
                            </div>
        
                            <div class="eme">
                                 <p>Copyright © 2023 PESO CABUYAO CITY</p>
                            </div>
                        </div>
        
                  </div>
             </div>
</div>

