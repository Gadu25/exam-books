<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;

class Dashboard extends Component
{
    public $total_books = 0;
    public $books = [];

    public $modal_show = false;
    public $selected_book = null;

    public function mount(){
        $this->books = Book::get();
        $this->total_books = count($this->books);
    }

    public function modalClicked($index){
        $this->modal_show = true;
        $this->selected_book = $this->books[$index];
    }

    public function closeModal(){
        $this->modal_show = false;
        $this->selected_book = null;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
