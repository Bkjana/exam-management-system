<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */

    public $homeName;
    public $homeLink;
    public $subjectLink;
    public $examLink;
    public $logoutLink;

    public function __construct($homeName, $homeLink, $subjectLink, $examLink, $logoutLink)
    {
        $this->homeName = $homeName;
        $this->homeLink = $homeLink;
        $this->subjectLink = $subjectLink;
        $this->examLink = $examLink;
        $this->logoutLink = $logoutLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}