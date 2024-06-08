<div>
    <div class="container mt-4">
        <div class="card mb-4 shadow-0">
            <div class="card-body">
                <span><small>Total Books</small></span>
                <h4 class="fs-4">{{$total_books}}</h4>
            </div>
        </div>
        <div class="row mt-3">
            @foreach($books as $index => $book)
                <div class="dashboard-col col-sm-4 p-4 d-flex justify-content-center" wire:click="modalClicked({{$index}})">
                    <img class="dashboard-thumb px-3" src={{ asset('storage/' . $book->cover) }} alt="book cover"/>
                </div>
            @endforeach
        </div>
    </div>

    <!-- modal -->
    @if($modal_show)
        <div class="my-modal">
            <div class="card">
                <div class="card-body px-4">
                    <div class="d-flex justify-content-end">
                        <span wire:click="closeModal"><i class="fa fa-times cursor-pointer"></i></span>
                    </div>
                    <div class="mt-2 d-flex justify-content-start">
                        <img class="cover" src={{ asset('storage/' . $selected_book['cover']) }} alt="book cover"/>
                        <div class="px-4">
                            <h1 class="fs-1">{{$selected_book['name']}}</h1>
                            <h5 class="fs-5">Written By: {{$selected_book['author']}}</h5>
                            <p>{{$selected_book['page_count']}} pages.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     @endif
</div>
