<div>
    <div class="container mt-4">
        <div class="card border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h2 class="fs-2">Books</h2>
                    <a href="{{ route('create_book') }}">
                        <button class="btn btn-success btn-sm rounded-pill"><i class="fa fa-plus"></i> New</button>
                    </a>
                </div>
                <div class="py-2">
                    <p>Filters:</p>
                    <div class="d-flex flex-row">
                        <div class="col-md-6 form-floating me-2">
                            <input class="form-control rounded" type="text" wire:model="search"/>
                            <label>Input book name or author..</label>
                        </div>
                        <div class="col-md-4 form-floating me-2">
                            <select class="form-control rounded" wire:model="order">
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                            <label>Select Order</label>
                        </div>
                        <div class="col-md-2 me-2">
                            <button class="btn btn-primary h-100" wire:click="filter"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                @foreach($books as $index => $book)
                <div wire:click="modalClicked({{$index}})">

                    <div class="book d-flex justify-content-between p-2 mt-4 cursor-pointer" wire:click="modalClicked({{$index}})">
                        <img class="thumb" src={{ asset('storage/' . $book->cover) }} alt="book cover"/>
                        <div class="container">
                            <h3 class="fs-3">{{$book->name}}</h3>
                            <p><i>{{$book->author}}</i></p>
                            <span><small>{{$book->page_count}} pages.</small></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('update_book', ['id' => $selected_book['id']]) }}">
                            <button class="btn btn-primary rounded-pill me-2"><i class="fa fa-pen"></i> Edit</button>
                        </a>
                        <button class="btn btn-danger rounded-pill" wire:click="delete({{$selected_book['id']}})"><i class="fa fa-trash"></i> Delete</button>
                    </div>
                </div>
            </div>
        </div>
     @endif
</div>
