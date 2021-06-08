<div class="col-lg-6 float-lg-end mb-3 me-3 bg-success rounded-2 text-center ms-3" id="news">
    <h1 class="display-3 fw-bold pt-1 text-uppercase mb-2 text-light"><img src="{{ url('/')}}/svg/news-index.svg"
            width="60" height="60"> <b>Novità</b> </h1>
</div>
@if(count($news) == 0)
<div class="col-lg-6 me-3 float-lg-end mb-5 text-center pt-3 pb-5" id="news-div">
    <h1 class="text-uppercase text-black-50"><i>Non ci sono novità ...</i></h1>
</div>
@else
<div class="col-lg-6 me-3 mb-5 ms-3 float-lg-end" id="news-div">
    <div class="accordion" id="accordionNews">
        @foreach($news as $news)
        <div class="accordion-item">
            @if($loop->first)
            <h2 class="accordion-header" id="heading{{$loop->index}}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{$loop->index}}" aria-expanded="true"
                    aria-controls="collapse{{$loop->index}}">
                    <div class="title-accordion me-0"> {{$news->title }} </div>
                </button>
            </h2>
            <div id="collapse{{$loop->index}}" class="accordion-collapse collapse show"
                aria-labelledby="heading{{$loop->index}}" data-bs-parent="#accordionNews">
                <div class="accordion-body accordion-body-custom overflow-auto">
                    <div class="">{{ $news->description }}</div>
                </div>
            </div>
            @else
            <h2 class="accordion-header" id="heading{{$loop->index}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{$loop->index}}" aria-expanded="false"
                    aria-controls="collapse{{$loop->index}}">
                    <div class="title-accordion me-0"> {{$news->title }} </div>
                </button>
            </h2>
            <div id="collapse{{$loop->index}}" class="accordion-collapse collapse"
                aria-labelledby="heading{{$loop->index}}" data-bs-parent="#accordionNews">
                <div class="accordion-body accordion-body-custom overflow-auto">
                    <div class="">{{ $news->description }}</div>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endif