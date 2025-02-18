<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    // declare navbar variable
    public array $navbar;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {        
        // get current route
        $currentRoute = request()->route()->getName();
        
        // navbar link name
        $this->navbar = [
            // ['name' => 'Dashboard', 'url' => route('dashboard'), 'active' => $currentRoute === 'dashboard'],
            ['name' => 'Projects', 'url' => route('projects.index'), 'active' => $currentRoute === 'projects.index'],
            ['name' => 'Tasks', 'url' => route('tasks.index'), 'active' => $currentRoute === 'tasks.index'],
            // ['name' => 'History', 'url' => route('history'), 'active' => $currentRoute === 'history'],
            // ['name' => 'Profile', 'url' => route('profile'), 'active' => $currentRoute === 'profile'],
        ];    
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar',[
            'navbar' => $this->navbar
        ]);
    }
}
