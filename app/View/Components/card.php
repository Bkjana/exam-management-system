<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    /**
     * Create a new component instance.
     */

    public $cardName;
    public $cardTitle;
    public $cardDesc;
    public $cardLinkName;
    public $cardLink;

    public function __construct($cardName, $cardTitle="", $cardDesc="", $cardLinkName="", $cardLink="")
    {
        $this->cardName=$cardName;
        $this->cardTitle=$cardTitle;
        $this->cardDesc=$cardDesc;
        $this->cardLinkName=$cardLinkName;
        $this->cardLink=$cardLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
