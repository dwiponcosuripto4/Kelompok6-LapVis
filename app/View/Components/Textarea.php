<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $id;

    public function __construct($name, $id = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
    }

    public function render()
    {
        return view('components.textarea');
    }
}
