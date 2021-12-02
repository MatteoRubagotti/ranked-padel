<div class="accordion" id="accordionFlushCampo">
    <div class="accordion-item">
        <h1 class="accordion-header" id="flush-headingCampo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseCampo" aria-expanded="false" aria-controls="flush-collapseCampo">
                <h3 class="ms-auto text-uppercase text-center display-6 font-weight-bold mb-4 mt-4"><b>Aggiungi
                        campo</b>
                </h3>
            </button>
        </h1>
        <div id="flush-collapseCampo" class="accordion-collapse collapse pt-4" aria-labelledby="flush-headingCampo"
            data-bs-parent="#accordionFlushCampo">
            <form name="addCampo" method="post" action="{{ route('admin.aggiungiCampo') }}" id="addCampo">
                @csrf
                <div class="container">
                    <div class="mb-3">
                        <label for="nameField" class="form-label font-weight-bold">Nome</label>
                        <input type="text" name="nameField" class="form-control" id="nameField"
                            placeholder="Nome del campo" oninvalid="this.setCustomValidity('Campo obbligatorio')"
                            oninput="setCustomValidity('')" autofocus required>
                            <b><span id="name-field-alert" class="text-danger"></span></b>
                    </div>

                    <div class="mb-3 ms-4">
                        <input class="form-check-input" type="checkbox" value="1" id="checkIndoor" name="indoor">
                        <label class="form-check-label" for="checkIndoor">
                            Al chiuso
                        </label>
                    </div>

                    <div class="mb-3">
                        <input type="radio" class="btn-check" name="available" id="available" autocomplete="off"
                            value="1" checked>
                        <label class="btn btn-outline-success" for="available">Disponibile</label>

                        <input type="radio" class="btn-check" name="available" id="unavailable" autocomplete="off"
                            value="0">
                        <label class="btn btn-outline-danger" for="unavailable">Non disponibile</label>
                    </div>

                    <div class="col-12 w-100 mb-3 text-right">
                        <button type="submit" class="btn btn-primary text-uppercase font-weight-bold"
                            onclick="event.preventDefault(); checkNameField()">Aggiungi
                            campo</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div>