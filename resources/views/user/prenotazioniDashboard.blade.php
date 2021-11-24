<h1 class="text-uppercase text-primary text-center display-6 font-weight-bold mb-4 mt-4"><b>Le mie
        prenotazioni</b></h1>

<div class="list-group offset-lg-1 col-lg-7 col-md-9 col-sm-11 col-12 ms-2 ms-sm-auto me-sm-auto"
    id="reservations-section">

    @foreach ($reservations as $reservation)

        <a class="list-group-item" aria-current="true">
            <div class="d-flex w-100 justify-content-between mt-1">
                <h5 class="text-uppercase mb-3 me-3"><b>Data:</b> {{ $reservation->date }}</h5>
                <h5 class="text-uppercase"><b>Orario</b> - {{ $reservation->time }}</h5>

                <form name="eliminaPrenotazione" method="post"
                    action="{{ route('dashboard.eliminaPrenotazione', ['idGame' => $reservation->id]) }}">
                    @csrf
                    @if ($players[$reservation->id] > 1)
                        <div data-bs-toggle="tooltip" title="Prenotazione non cancellabile!" data-bs-placement="top"
                            id="reservation-not-removable{{ $loop->index }}">
                            <script>
                                var index = JSON.parse("{{ json_encode($loop->index) }}");
                                var element = document.getElementById('reservation-not-removable'.concat(index));
                                var tooltip = new bootstrap.Tooltip(element);
                            </script>
                            <button type="button" class="btn bg-danger text-white p-2 pt-0 pb-0 mt-2 ms-2" disabled>
                                CANCELLA <i class="bi bi-trash"></i>
                            </button>
                        </div>
                        {{-- <button type="button" class="btn bg-danger text-white p-2 pt-0 pb-0" data-bs-toggle="modal"
                            data-bs-target="#confirmDelete" style="" disabled>
                            Elimina
                        </button> --}}
                    @else
                        {{-- <button type="button" class="btn bg-danger text-white p-2 pt-0 pb-0" data-bs-toggle="modal"
                            data-bs-target="#confirmDelete{{ $loop->index }}" style="">
                            X
                        </button> --}}
                        <button type="button" class="btn bg-danger text-white p-2 pt-0 pb-0 mt-2 ms-2"
                            data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $loop->index }}" style=""> CANCELLA
                            <i class="bi bi-trash"></i>
                        </button>
                    @endif
                    <div class="modal fade" id="confirmDelete{{ $loop->index }}" tabindex="-1"
                        aria-labelledby="Conferma eliminazione" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sei sicuro di eliminare la tua
                                        prenotazione?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex w-100 justify-content-between mt-1">
                                        <h5 class="text-uppercase mb-3 me-3"><b>Data:</b> {{ $reservation->date }}
                                        </h5>
                                        <h5 class="text-uppercase"><b>Orario</b> - {{ $reservation->time }}</h5>
                                    </div>
                                    <div class="text-center">
                                        <h5>{{ $fields[$reservation->id]->name }}</h5>

                                        @if ($fields[$reservation->id]->indoor)
                                            <i class="bi bi-umbrella me-1 ms-2"></i>
                                            <span class="text-uppercase font-weight-normal"> <i>Coperto</i></span>
                                        @else
                                            <i class="bi bi-brightness-high me-1 ms-2"></i>
                                            <span class="text-uppercase font-weight-normal"> <i>Scoperto</i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annulla</button>
                                    <button type="submit" class="btn btn-danger text-uppercase">Elimina</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="mb-1 text-uppercase font-weight-bold">

                <div class="d-flex w-100 justify-content-between">
                    <div>
                        <h5>{{ $fields[$reservation->id]->name }}</h5>

                        @if ($fields[$reservation->id]->indoor)
                            <i class="bi bi-umbrella me-1 ms-2"></i>
                            <span class="text-uppercase font-weight-normal"> <i>Coperto</i></span>
                        @else
                            <i class="bi bi-brightness-high me-1 ms-2"></i>
                            <span class="text-uppercase font-weight-normal"> <i>Scoperto</i></span>
                        @endif
                    </div>

                    <div class="mt-3" style="text-align: center; vertical-align: middle;">
                        @if ($players[$reservation->id] == 4)
                            <span class="mt-1 badge bg-secondary rounded-pill pb-2 pe-3"> <i
                                    class="bi bi-people me-1 ms-2" style="font-size: 16px;"></i>
                                Giocatori: <span class="font-weight-normal">
                                    {{ $players[$reservation->id] }}/4 </span>
                            </span>
                        @elseif($players[$reservation->id] == 1)
                            <span class="mt-1 badge bg-success rounded-pill pb-2 pe-3"> <i
                                    class="bi bi-people me-1 ms-2" style="font-size: 16px;"></i>
                                Giocatori: <span class="font-weight-normal">
                                    {{ $players[$reservation->id] }}/4 </span>
                            </span>
                        @else
                            <span class="mt-1 badge rounded-pill pb-2 pe-3" style="background-color: orange"> <i
                                    class="bi bi-people me-1 ms-2" style="font-size: 16px;"></i>
                                Giocatori: <span class="font-weight-normal">
                                    {{ $players[$reservation->id] }}/4 </span>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </a>

    @endforeach

    <div class="container mt-3"> {{ $reservations->appends(['pageName' => 'reservations-section'])->links() }} </div>

</div>
