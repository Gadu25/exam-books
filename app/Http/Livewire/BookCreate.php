<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Book;

class BookCreate extends Component
{
    use WithFileUploads;

    public $name = "";
    public $author = "";
    public $page_count = "";
    public $file = null;

    public $message = [
        'status' => 'success',
        'content' => ''
    ];

    public function mount(){

    }

    public function save(){
        $validated = $this->validate([
            'name'          =>  'required|unique:books|max:255',
            'author'        =>  'required|max:255',
            'page_count'    =>  'required',
            'file'          =>  'required|image'
        ]);

        $book = new Book;
        $book->name = $this->name;
        $book->author = $this->author;
        $book->page_count = $this->page_count;

        // file uploading
        $uploaded = $this->file->store('uploads', 'public');

        $book->cover = $uploaded;

        if($book->save()){
            $this->message['status'] = 1;
            $this->message['content'] = "Book is successfully saved";
    
            $this->name = "";
            $this->author = "";
            $this->page_count = "";
            $this->file = null;
        }else{
            $this->message['status'] = 0;
            $this->message['content'] = "Book was not saved. Please Try Again";
        }


    }

    public function render()
    {
        return view('livewire.book-create');
    }
}
