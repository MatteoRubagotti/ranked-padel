<h1 class="text-uppercase text-success text-center display-6 font-weight-bold mb-4 mt-4"><b>Le mie
        partite da giocare</b></h1>

<div class="list-group offset-lg-1 col-lg-7 col-md-9 col-sm-11 col-12 ms-2 ms-sm-auto me-sm-auto">

    @foreach ($userGames as $game)

        <a class="list-group-item" aria-current="true">
            <div class="d-flex w-100 justify-content-between mt-1">
                <h5 class="text-uppercase mb-3 me-3"><b>Data:</b> {{ $game->date }}</h5>
                <h5 class="text-uppercase"><b>Orario</b> - {{ $game->time }}</h5>

                <form name="eliminaPartita" method="post"
                    action="{{ route('dashboard.eliminaPartita', ['idGame' => $game->id]) }}">
                    @csrf
                    {{-- <button type="button" class="btn bg-danger text-white p-2 pt-0 pb-0" data-bs-toggle="modal"
                data-bs-target="#confirmDeleteGame" style="">
                X
            </button> --}}
                    <button type="button" class="btn bg-danger text-white p-2 pt-0 pb-0 mt-2 ms-2 text-uppercase" data-bs-toggle="modal"
                        data-bs-target="#confirmDelete{{ $game->id }}" style=""> Cancella
                        <i class="bi bi-trash"></i>
                    </button>

                    <div class="modal fade" id="confirmDelete{{ $game->id }}" tabindex="-1"
                        aria-labelledby="Conferma eliminazione" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelPartite{{ $game->id }}">Sei sicuro di cancellare la tua partecipazione?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex w-100 justify-content-between mt-1">
                                        <h5 class="text-uppercase mb-3 me-3"><b>Data:</b> {{ $game->date }}</h5>
                                        <h5 class="text-uppercase"><b>Orario</b> - {{ $game->time }}</h5>
                                    </div>
                                    <div class="text-center">
                                        <h5>{{ $fieldsUserGames[$game->id]->name }}</h5>

                                        @if ($fieldsUserGames[$game->id]->indoor)
                                            <span class="text-uppercase font-weight-normal"> <i>Al chiuso</i></span>
                                        @else
                                            <span class="text-uppercase font-weight-normal"> <i>All'aperto</i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer flex-start">
                                    <span class="mx-auto">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    </span>
                                    <span class="mx-auto">
                                        <button type="submit" class="btn btn-danger text-uppercase"> <i class="bi bi-trash"></i> Cancella</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="mb-1 text-uppercase font-weight-bold" id="userGames-section">

                <div class="d-flex w-100 justify-content-between">
                    <div>
                        <h5>{{ $fieldsUserGames[$game->id]->name }}</h5>

                        @if ($fieldsUserGames[$game->id]->indoor)
                            <span class="text-uppercase font-weight-normal"> <i>Al chiuso</i></span>
                        @else
                            <span class="text-uppercase font-weight-normal"> <i>All'aperto</i></span>
                        @endif
                    </div>

                    <div class="mt-3" style="text-align: center; vertical-align: middle;">
                        {{-- @if ($playersUserGames[$game->id] == 4)
                            <span class="mt-1 badge bg-secondary rounded-pill pb-2 pe-3"> <i
                                    class="bi bi-people me-1 ms-2" style="font-size: 16px;"></i>
                                Giocatori: <span class="font-weight-normal"> {{ $playersUserGames[$game->id] }}/4
                                </span>
                            </span>
                        @else
                            <span class="mt-1 badge bg-primary rounded-pill pb-2 pe-3"> <i
                                    class="bi bi-people me-1 ms-2" style="font-size: 16px;"></i>
                                Giocatori: <span class="font-weight-normal"> {{ $playersUserGames[$game->id] }}/4
                                </span>
                            </span>
                        @endif --}}
                        <span class="mt-3 ps-0 pe-2" style="font-size: 18px"> <i class="bi bi-people me-1 ms-2"
                                style="font-size: 16px;""></i>
                        Giocatori: <span class="   font-weight-normal">
                                {{ $playersUserGames[$game->id] }}/4 </span>
                        </span>
                    </div>
                </div>
            </div>
        </a>

    @endforeach

    <div class="container mt-3"> {{ $userGames->appends(['pageName' => 'userGames-section'])->links() }} </div>

</div>

<hr class="mb-5">

<h1 class="text-uppercase text-success text-center display-6 font-weight-bold mb-4 mt-4"><b>Le mie
        partite giocate</b></h1>

<div class="list-group offset-lg-1 col-lg-7 col-md-9 col-sm-11 col-12 ms-2 ms-sm-auto me-sm-auto">


    @foreach ($userPastGames as $game)
        @if ($game != null)
            <a class="list-group-item" aria-current="true">
                <div class="d-flex w-100 justify-content-between mt-1">
                    <h5 class="text-uppercase mb-3 me-3"><b>Data:</b> {{ $game->date }}</h5>
                    <h5 class="text-uppercase"><b>Orario</b> - {{ $game->time }}</h5>

                    <form name="updateResult{{ $loop->index }}" method="post"
                        action="{{ route('dashboard.aggiornaRisultato', ['idGame' => $game->id]) }}">
                        @csrf
                        @if ($results[$game->id] == 0 || $results[$game->id] == 1)
                            <button type="button" class="btn bg-primary text-white p-2 text-uppercase"
                                data-bs-toggle="modal" data-bs-target="#updateResult{{ $loop->index }}" style="">
                                Modifica risultato<i class="ms-2 bi bi-pencil-square"></i>
                            </button>
                        @else
                            <button type="button" class="btn bg-primary text-white p-2 text-uppercase"
                                data-bs-toggle="modal" data-bs-target="#updateResult{{ $loop->index }}" style="">
                                Aggiungi risultato <i class="ms-2 bi bi-plus-circle-fill"></i>
                            </button>
                        @endif

                        <div class="modal fade" id="updateResult{{ $loop->index }}" tabindex="-1"
                            aria-labelledby="Aggiorna risultato" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Hai vinto oppure perso?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex w-100 justify-content-between mt-1">
                                            <h5 class="text-uppercase mb-3 me-3"><b>Data:</b> {{ $game->date }}</h5>
                                            <h5 class="text-uppercase"><b>Orario</b> - {{ $game->time }}</h5>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-uppercase">{{ $fieldsUserPastGames[$game->id]->name }}
                                            </h5>

                                            @if ($fieldsUserPastGames[$game->id]->indoor)
                                                <span class="text-uppercase font-weight-normal"> <i>Al chiuso</i></span>
                                            @else
                                                <span class="text-uppercase font-weight-normal"> <i>All'aperto</i></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" for="updateResult{{ $loop->index }}"
                                            class="btn btn-success text-uppercase me-4" name="result"
                                            value="1">Vinto</button>
                                        <button type="submit" for="updateResult{{ $loop->index }}"
                                            class="btn btn-danger text-uppercase ms-4" name="result"
                                            value="0">Perso</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="mb-1 text-uppercase font-weight-bold" id="userPastGames-section">

                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <h5>{{ $fieldsUserPastGames[$game->id]->name }}</h5>

                            @if ($fieldsUserPastGames[$game->id]->indoor)
                                <span class="text-uppercase font-weight-normal"> <i>Al chiuso</i></span>
                            @else
                                <span class="text-uppercase font-weight-normal"> <i>All'aperto</i></span>
                            @endif
                        </div>

                        <div class="mt-3" style="text-align: center; vertical-align: middle;">
                            {{-- @if ($playersPerUserPastGames[$game->id] == 4)
                                <span class="mt-1 badge bg-secondary rounded-pill pb-2 pe-3"> <i
                                        class="bi bi-people me-1 ms-2" style="font-size: 16px;"></i>
                                    Giocatori: <span class="font-weight-normal">
                                        {{ $playersPerUserPastGames[$game->id] }}/4 </span>
                                </span>
                            @else
                                <span class="mt-1 badge bg-secondary rounded-pill pb-2 pe-3"> <i
                                        class="bi bi-people me-1 ms-2" style="font-size: 16px;"></i>
                                    Giocatori: <span class="font-weight-normal">
                                        {{ $playersPerUserPastGames[$game->id] }}/4 </span>
                                </span>
                            @endif --}}
                        </div>
                    </div>
                    <div class="mt-2 font-weight-bold">
                        Risultato: @if ($results[$game->id] == 1)
                            <span class="text-success font-weight-bolder">Vittoria</span>
                        @elseif($results[$game->id] == -1)
                            &ensp;--
                        @elseif($results[$game->id] == 0)
                            <span class="text-danger font-weight-bolder">Sconfitta</span>
                        @endif
                    </div>
                </div>
            </a>
        @endif
    @endforeach

    <div class="container mt-3"> {{ $userPastGames->appends(['pageName' => 'userPastGames-section'])->links() }}
    </div>

</div>
