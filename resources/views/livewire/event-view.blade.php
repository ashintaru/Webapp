<div>
@include('layouts.header')
    <div class="container ">
        <div class="row">
            <div class="col">
              <h1>Whats Happening</h1>
            </div>
            <div id="carouselExampleCaptions" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              </div>
              @if(!empty($lists1))
                    @foreach($lists1 as $list)
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('storage/'.$list->image)}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                     <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{asset('assets/img/bg4.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>First slide label</h5>
                          <p>Some representative placeholder content for the first slide.</p>
                        </div>
                      </div>
                    </div>
                @endif              
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>


        </div>
        <div class="row">
          <div class="col">
            <h1>Event for this Coming 6 month</h1>
          </div>
        </div>
        <div class="row">
          @if(!empty($lists))
            @foreach($lists as $list)
            <div class="col-3">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{asset('storage/'.$list->image)}}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$list->eventTitle}}</h5>
                      <p class="card-text">{{$list->eventPlace}}</p>
                      <p class="card-text"><small class="text-body-secondary">{{\Carbon\Carbon::parse( $list->eventDate)->diffForHumans()}}</small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @else

          @endif

        </div>
    </div>

{{-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('assets/img/bg4.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> --}}
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
<style>
  .card {
  --blur: 16px;
  --size: clamp(300px, 50vmin, 600px);
  width: var(--size);
  aspect-ratio: 4 / 3;
  position: relative;
  border-radius: 2rem;
  overflow: hidden;
  color: #000;
  transform: translateZ(0);
}

.card__img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transform: scale(calc(1 + (var(--hover, 0) * 0.25))) rotate(calc(var(--hover, 0) * -5deg));
  transition: transform 0.2s;
}

.card__footer {
  padding: 0 1.5rem;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  background: red;
  display: grid;
  grid-template-row: auto auto;
  gap: 0.5ch;
  background: hsl(0 0% 100% / 0.5);
  backdrop-filter: blur(var(--blur));
  height: 30%;
  align-content: center;
}

.card__action {
  position: absolute;
  aspect-ratio: 1;
  width: calc(var(--size) * 0.15);
  bottom: 30%;
  right: 1.5rem;
  transform: translateY(50%)
    translateY(
      calc(
        (var(--size) * 0.4)
      )
    )
    translateY(calc(var(--hover, 0) * (var(--size) * -0.4)));
  background: purple;
  display: grid;
  place-items: center;
  border-radius: 0.5rem;
  background: hsl(0 0% 100% / 0.5);
/*   backdrop-filter: blur(calc(var(--blur) * 0.5)); */
  transition: transform 0.2s;
}

.card__action svg {
  aspect-ratio: 1;
  width: 50%;
}

.card__footer span:nth-of-type(1) {
  font-size: calc(var(--size) * 0.065);
}

.card__footer span:nth-of-type(2) {
  font-size: calc(var(--size) * 0.035);
}

.card:is(:hover, :focus-visible) {
  --hover: 1;
}
</style>