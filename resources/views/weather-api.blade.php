<div class="col-lg-5 ms-3 mb-3 bg-success rounded-2 text-center me-3" id="weather">
    <h1 class="display-3 fw-bold pt-1 text-uppercase mb-2 text-light"> <b>Meteo</b> <img
            src="{{ url('/')}}/svg/weather.svg" width="60" height="60"> </h1>
</div>

<script type="text/javascript">
    getWeather();
</script>

<div class="row col-lg-5 mb-4">
    <div class="col-5 text-center ms-3">
        <div class="list-group" id="list-tab" role="tablist">
            @for($i = 0; $i < 3; $i++) @if($i==0) <a class="list-group-item list-group-item-action active"
                id="list-day{{ $i }}-list" data-bs-toggle="list" href="#list-day{{ $i }}" role="tab"
                aria-controls="list-day{{ $i }}" onclick="getWeather()"></a>
                @else
                <a class="list-group-item list-group-item-action" id="list-day{{ $i }}-list" data-bs-toggle="list"
                    href="#list-day{{ $i }}" role="tab" aria-controls="list-day{{ $i }}"
                    onclick="getWeather()"></a>
                @endif
                @endfor
        </div>
    </div>

    <div class="col-6 pe-0 me-0">
        <div class="tab-content text-center" id="nav-tabContent">
            @for($i = 0; $i < 3; $i++) @if($i==0) <div class="tab-pane fade show active" id="list-day{{ $i }}"
                role="tabpanel" aria-labelledby="list-day{{ $i }}-list">
                @else <div class="tab-pane fade" id="list-day{{ $i }}" role="tabpanel"
                    aria-labelledby="list-day{{ $i }}-list"> @endif
                    <h3 id="date-day{{ $i }}" class="m-0 text-center"></h3>
                    <img src="" id="img-day{{ $i }}" class="" width="60" height="60">
                    <h4 class="location-name text-center mt-2"></h4>
                </div>
                @endfor
        </div>
    </div>
</div>