<div class="accordion" id="accordionFlushNews">
    <div class="accordion-item">
        <h1 class="accordion-header" id="flush-headingNews">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseNews" aria-expanded="false" aria-controls="flush-collapseNews">
                <h3 class="ms-auto text-uppercase text-center display-6 font-weight-bold mb-4 mt-4"><b>Aggiungi
                        novità</b>
                </h3>
            </button>
        </h1>
        <div id="flush-collapseNews" class="accordion-collapse collapse pt-4" aria-labelledby="flush-headingNews"
            data-bs-parent="#accordionFlushNews">
            <form name="addNews" method="post" action="{{ route('admin.aggiungiNovità') }}">
                @csrf
                <div class="container">
                    <div class="mb-3">
                        <label for="titleNews" class="form-label font-weight-bold">Titolo</label>
                        <input type="text" name="title" class="form-control" id="title-news"
                            placeholder="Titolo della novità">
                        <b><span id="title-news-alert" class="text-danger"></span></b>
                    </div>
                    <div class="mb-3">
                        <label for="descriptionNews" class="form-label font-weight-bold">Descrizione</label>
                        <textarea name="description" class="form-control" id="descriptionNews" rows="4"
                            placeholder="Descrizione della novità"></textarea>
                        <b><span id="description-news-alert" class="text-danger"></span></b>
                    </div>

                    <div class="col-12 w-100 mb-3 text-right">
                        <button type="submit" class="btn btn-primary text-uppercase font-weight-bold"
                            onclick="event.preventDefault(); checkNews()">Aggiungi
                            novità</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div>