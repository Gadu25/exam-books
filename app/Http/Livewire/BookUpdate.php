<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Book;

class BookUpdate extends Component
{

    use WithFileUploads;

    public $selected;
    public $name = "";
    public $author = "";
    public $page_count = "";
    public $file = null;

    public $message = [
        'status' => 'success',
        'content' => ''
    ];

    public function mount($id){
        $this->selected = $id;
        $book = Book::findOrFail($id);
        $this->id = $book->id;
        $this->name = $book->name;
        $this->author = $book->author;
        $this->page_count = $book->page_count;
    }

    public function save(){
        $validated = $this->validate([
            'name'          =>  'required|max:255',
            'author'        =>  'required|max:255',
            'page_count'    =>  'required',
            // 'file'          =>  'required|image'
        ]);

        $book = Book::findOrFail($this->selected);
        $book->name = $this->name;
        $book->author = $this->author;
        $book->page_count = $this->page_count;

        // file uploading
        if($this->file != null){
            $uploaded = $this->file->store('uploads', 'public');
            $book->cover = $uploaded;
        }

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

        redirect()->route('books');

    }

    public function render()
    {
        return view('livewire.book-update');
    }
}
