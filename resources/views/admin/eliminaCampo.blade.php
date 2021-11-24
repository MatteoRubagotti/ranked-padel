<form name="deleteField" method="post" action="{{ route('admin.eliminaCampo', ['idField' => $field->id]) }}">
    @csrf
    @method('delete')
    @if ($fieldsDelete[$field->id]) {{-- There is a reservation with this field ==> disabled --}}
        <button type="button" class="btn bg-danger text-white p-2 pt-0 pb-0 mt-2 ms-2" data-bs-toggle="modal"
            data-bs-target="#confirmDelete{{ $loop->index }}" style=""> ELIMINA <i class="bi bi-trash"></i>
        </button>
    @else
        <div data-bs-toggle="tooltip" title="Campo non eliminabile!" data-bs-placement="top"
            id="field-not-removable{{ $loop->index }}">
            <script>
                var index = JSON.parse("{{ json_encode($loop->index) }}");
                var element = document.getElementById('field-not-removable'.concat(index));
                var tooltip = new bootstrap.Tooltip(element);
            </script>
            <button type="button" class="btn bg-danger text-white p-2 pt-0 pb-0 mt-2 ms-2" disabled>
                ELIMINA <i class="bi bi-trash"></i>
            </button>
        </div>

    @endif
    <div class="modal fade" id="confirmDelete{{ $loop->index }}" tabindex="-1"
        aria-labelledby="Conferma eliminazione" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sei sicuro di eliminare il tuo campo?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex w-100 justify-content-center mt-1">
                        <h5 class="text-uppercase mb-3 me-3"> {{ $field->name }}
                            @if ($field->available)
                                <i class="bi bi-circle-fill ms-2" style="color: rgb(0, 175, 0); font-size: 28px"></i>
                            @else
                                <i class="bi bi-circle-fill ms-2" style="color: red; font-size: 28px"></i>
                            @endif
                        </h5>

                    </div>
                    <div class="text-center">
                        @if ($field->indoor)
                            <i class="bi bi-umbrella me-1"></i>
                            <span class="text-uppercase font-weight-normal me-2"> <i>Coperto</i></span>
                        @else
                            <i class="bi bi-brightness-high me-1"></i>
                            <span class="text-uppercase font-weight-normal me-2"> <i>Scoperto</i></span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-danger text-uppercase">Elimina</button>
                </div>
            </div>
        </div>
    </div>
</form>
