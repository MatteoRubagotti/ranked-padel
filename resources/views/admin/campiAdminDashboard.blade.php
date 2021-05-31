<h3 class="ms-auto text-uppercase text-primary text-center display-6 font-weight-bold mb-4 mt-4"><b>
        I miei campi</b>
</h3>
<div class="list-group offset-lg-1 col-lg-7 col-md-9 col-sm-11 col-12 ms-2 ms-sm-auto me-sm-auto">

    @foreach($allFields as $field)

    <a class="list-group-item" aria-current="true">

        <div class="d-flex justify-content-end">
            <form name="editField" method="post" action="{{ route('admin.modificaCampo', ['idField' => $field->id]) }}">
                @csrf
                <div class="me-0"><button type="button"
                        class="btn btn-outline-primary p-2 pt-0 pb-0 text-uppercase mt-2" data-bs-toggle="modal"
                        data-bs-target="#confirmEdit{{$loop->index}}" style="">
                        <i class="bi bi-pencil-square"></i>
                    </button></div>
                <div class="modal fade" id="confirmEdit{{$loop->index}}" tabindex="-1"
                    aria-labelledby="Conferma eliminazione" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Modifica il tuo campo
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="nameField" class="form-label font-weight-bold">Nome campo</label>
                                        <input type="text" name="nameField" class="form-control"
                                            id="nameField{{ $loop->index }}" placeholder="Nome del campo"
                                            value="{{ $field->name }}" required>
                                    </div>

                                    <div class="mb-3 ms-4">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="checkIndoor{{ $loop->index }}" name="indoor" @if($field->indoor) checked
                                        @endif>
                                        <label class="form-check-label" for="checkIndoor">
                                            Coperto
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <input type="radio" class="btn-check" name="available"
                                            id="available{{ $loop->index }}" autocomplete="off" value="1"
                                            @if($field->available == 1) checked @endif>
                                        <label class="btn btn-outline-success"
                                            for="available{{ $loop->index }}">Disponibile</label>

                                        <input type="radio" class="btn-check" name="available"
                                            id="unavailable{{ $loop->index }}" autocomplete="off" value="0"
                                            @if($field->available == 0) checked @endif>
                                        <label class="btn btn-outline-danger" for="unavailable{{ $loop->index }}">Non
                                            disponibile</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <button type="submit" class="btn btn-primary text-uppercase">Modifica <i
                                        class="ms-1 bi bi-pencil-square"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex w-100 mt-1 justify-content-center p-2 pt-0">
            <h3 class="text-uppercase mb-1 me-3 mt-1"><b>{{$field->name}}</b></h3>
            @if($field->available)
            <i class="bi bi-circle-fill" style="color: rgb(0, 175, 0); font-size: 28px"></i>
            @else
            <i class="bi bi-circle-fill" style="color: red; font-size: 28px"></i>
            @endif

        </div>

        <div class="mb-1 text-uppercase font-weight-bold">

            <div class="d-flex w-100 justify-content-center mb-3">
                <div>
                    @if($field->indoor)
                    <i class="bi bi-umbrella me-1 ms-1"></i>
                    <span class="text-uppercase font-weight-normal"> <i>Coperto</i></span>
                    @else
                    <span class="text-uppercase font-weight-normal"> <i>Scoperto</i></span>
                    <i class="bi bi-brightness-high me-1 ms-1"></i>
                    @endif
                </div>
            </div>
        </div>
    </a>

    @endforeach

    <div class="container mt-3"> {{ $allFields->appends(['pageName' => 'fields_page'])->links() }} </div>

</div>