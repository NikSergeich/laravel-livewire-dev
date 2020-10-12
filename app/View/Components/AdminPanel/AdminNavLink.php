<?php

namespace App\View\Components\AdminPanel;

use Illuminate\View\Component;

class AdminNavLink extends Component
{
    public $href;
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href,$active)
    {
        //
        $this->href = $href;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admin-panel.admin-nav-link');
    }
}
