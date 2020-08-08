<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title = '';
    public $icon = '';
    public $modalId = '';
    public $formId = '';
    public $modalSize = '';
    public $yesOrNo = '';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modalId, $title, $icon, $formId, $modalSize = '', $yesOrNo = 'false')
    {
        $this->modalId = $modalId;
        $this->title = $title;
        $this->icon = $icon;
        $this->formId = $formId;
        $this->modalSize = $modalSize;
        $this->yesOrNo = $yesOrNo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
