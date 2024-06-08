<div>
    <div class="container mt-4">
        <div class="card border-0">
            <div class="card-body">
                <h3 class="fs-3">New Book</h3>
                @if($message['status'] == 1) 
                    @if($message['content'] != "") <p class="text-success">{{$message['content']}}</p> @endif
                @else
                    @if($message['content'] != "") <p class="text-danger">{{$message['content']}}</p> @endif
                @endif
                <div class="form-group mt-2 mx-4">
                    <div class="form-floating mb-2">
                        <input type="text" wire:model="name" class="form-control rounded" id="name" name="name" placeholder="Input book name.."/>
                        <label for="name">Book Name</label>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" wire:model="author" class="form-control rounded" id="author" name="author" placeholder="Input book author.."/>
                        <label for="author">Book Author</label>
                        @error('author') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="number" wire:model="page_count" class="form-control rounded" id="page_count" name="page_count" placeholder="Input book page count.."/>
                        <label for="page_count">Page Count</label>
                        @error('page_count') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <hr>
                    <div class="mt-2">
                        <p>Book Cover</p>
                        <input type="file" wire:model="file" class="form-control border w-100 p-3 rounded" id="cover" name="cover"/>
                        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button class="btn btn-primary rounded-pill" wire:click="save" type="button"><i class="fa fa-save"></i> Save Book</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>