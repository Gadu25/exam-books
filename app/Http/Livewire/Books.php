<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;

class Books extends Component
{

    public $books = [];
    public $search = "";
    public $order = "asc";

    public $modal_show = false;
    public $selected_book = null;

    public function mount(){
       $this->showBooks();
    }

    public function showBooks(){
        $this->books = Book::orderBy('name')->get();
    }

    public function filter(){
        $this->books = Book::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('author', 'like', '%'.$this->search.'%')
        ->orderBy('name', $this->order)
        ->get();
    }

    public function modalClicked($index){
        $this->modal_show = true;
        $this->selected_book = $this->books[$index];
    }

    public function closeModal(){
        $this->modal_show = false;
        $this->selected_book = null;
    }

    public function delete($id){
        $book = Book::findOrFail($id);
        $book->delete();
        $this->showBooks();
        $this->modal_show = false;
    }

    public function render()
    {
        return view('livewire.books');
    }
}
