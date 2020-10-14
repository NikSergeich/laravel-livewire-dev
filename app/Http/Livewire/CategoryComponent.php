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
    public $title;
    public $slug;
    public $description;
    public $parent_id;

    public $categories;
    public $category = [];

    public $selected_id;

    public $updateMode = false;

    public $delimeter;

    protected $rules = [
        'title' => 'required|min:2',
        'description' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $this->categories = Category::with('children')->where('parent_id',0)->get();

        return view('livewire.category-component');
    }

    public function resetForm() {
        $this->title = "";
        $this->slug = "";
        $this->description = "";
        $this->parent_id = "";
    }

    public function store() {
        $validatedData = $this->validate();

        if ($this->parent_id == null) {
            $parent_id = "0";
        }else{
            $parent_id = $this->parent_id;
        }

        $slug = Str::slug($this->title, '-');

        Category::create([
            'title' => $this->title,
            'slug' => $slug,  // не работает!!!
            'description' => $this->description,
            'parent_id' => $parent_id,
        ]);

        $this->resetForm();
    }

    public function edit($id) {
        $record = Category::findOrFail($id);

        $this->category = $record;

        $this->selected_id = $id;
        $this->title = $record->title;
        $this->slug = $record->slug;
        $this->description = $record->description;
        $this->parent_id = $record->parent_id;

        $this->updateMode = true;
    }

    public function update() {
        if ($this->selected_id) {
            Category::findOrFail($this->selected_id)->update([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'parent_id' => $this->parent_id,
            ]);

            $this->resetForm();

            $this->updateMode = false;
        }
    }

    public function destroy($id) {
        Category::findOrFail($id)->delete();
    }
}
