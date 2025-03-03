<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class KategoriList extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = DB::table(config('filamentblog.tables.prefix') . 'categories')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.kategori-list');
    }
}
