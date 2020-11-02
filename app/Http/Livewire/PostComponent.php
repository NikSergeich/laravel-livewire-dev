<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    public $categories;

    public function render()
    {
        $this->categories = Post::all();

        return view('livewire.post-component');
    }
}
