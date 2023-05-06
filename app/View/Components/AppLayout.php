<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        if (request()->user()->is_admin == true) {
            return view('layouts.admin');
        }
        return view('layouts.app');
    }
}
