<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modal extends Component
{
    public string $id;
    public string $title;
    public string $size;
    public string $closeEvent;
    public string $closeText;
    public bool $showHeader;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $id = 'modal-example',
        $title = 'Modal Example',
        $size = 'small',
        $closeEvent = 'close',
        $closeText = 'Close',
        $showHeader = true
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->size = match ($size) {
            'small' => 'sm:max-w-lg sm:w-full sm:mx-auto',
            'large' => 'lg:max-w-4xl lg:w-full lg:mx-auto',
            default => 'md:max-w-2xl md:w-full md:mx-auto',
        };
        $this->closeEvent = $closeEvent;
        $this->closeText = $closeText;
        $this->showHeader = $showHeader;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
