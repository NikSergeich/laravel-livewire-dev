<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class CategoryComponent extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    public $data, $title, $slug, $description, $parent_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = Category::all();
        return view('livewire.category-component');
    }

    public function createCategory() {

        if ($this->parent_id == null) {
            $parent_id = "0";
        }else{
            $parent_id = $this->parent_id;
        }

        Category::create([
            'title' => $this->title,
            'slug' => Str::slug($this->slug, '-'),
            'parent_id' => $parent_id,
            'description' => $this->description,
        ]);

    }

    public function editCategory($id) {
        $this->updateMode = true;
    }

    public function updateCategory() {
        $this->updateMode = false;
    }

    public function destroyCategory($id) {
        Category::findOrFail($id)->delete();
    }
}
