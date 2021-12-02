<h3 class="ms-auto text-uppercase text-center text-success display-6 font-weight-bold mb-4 mt-4" id="games_page"><b>Prenotazioni in corso</b></h3>
<div class="list-group offset-lg-1 col-lg-7 col-md-9 col-sm-11 col-12 ms-2 ms-sm-auto me-sm-auto">

    @foreach($reservations as $reservation)

    <a class="list-group-item" aria-current="true">
        <div class="d-flex w-100 justify-content-between mt-1">
            <h5 class="text-uppercase mb-3 me-3"><b>Data:</b> {{$reservation->date}}</h5>
            <h5 class="text-uppercase"><b>Orario</b> - {{$reservation->time}}</h5>

        </div>
        <div class="mb-1 text-uppercase font-weight-bold">

            <div class="d-flex w-100 justify-content-between">
                <div>
                    <h5>{{$fields[$reservation->id]->name}}</h5>

                    @if($fields[$reservation->id]->indoor)
                    <span class="text-uppercase font-weight-normal"> <i>Al chiuso</i></span>
                    @else
                    <span class="text-uppercase font-weight-normal"> <i>All'aperto</i></span>
                    @endif
                </div>

                <div class="mt-3" style="text-align: center; vertical-align: middle;">
                    {{-- @if($players[$reservation->id] == 4) --}}
                    <span class="mt-1 pb-2 pe-3"> <i class="bi bi-people me-1 ms-2"
                            style="font-size: 16px;"></i>
                        Giocatori: <span class="font-weight-normal">
                            {{ $players[$reservation->id] }}/4 </span>
                    </span>
                    {{-- @elseif($players[$reservation->id] == 1)
                    <span class="mt-1 badge bg-success rounded-pill pb-2 pe-3"> <i class="bi bi-people me-1 ms-2"
                            style="font-size: 16px;"></i>
                        Giocatori: <span class="font-weight-normal">
                            {{ $players[$reservation->id] }}/4 </span>
                    </span>
                    @else
                    <span class="mt-1 badge rounded-pill pb-2 pe-3" style="background-color: orange"> <i
                            class="bi bi-people me-1 ms-2" style="font-size: 16px;"></i>
                        Giocatori: <span class="font-weight-normal">
                            {{ $players[$reservation->id] }}/4 </span>
                    </span>
                    @endif --}}
                </div>
            </div>
        </div>
    </a>

    @endforeach

    <div class="container mt-3"> {{ $reservations->appends(['pageName' => 'reservations_page'])->links() }} </div>

</div>