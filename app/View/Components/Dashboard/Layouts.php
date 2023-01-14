<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Layouts extends Component
{
    public $title;
    public $header;

    public function __construct($title, $header)
    {
        $this->title = $title;
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dashboard.layouts.app');
    }
}
