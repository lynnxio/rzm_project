<?php

namespace App\View\Components\TailwindElement;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        $statuses = Status::all();
        $assets = Asset::all();
        $categories = Category::all();
        return view('components.TailwindElement.select', compact('statuses', 'assets', 'categories'));
    }
}
