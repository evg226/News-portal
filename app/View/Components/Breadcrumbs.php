<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public array $breadcrumbs;
    public string $title = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $breadcrumbs = explode('/', request()->path());
        $link = 'admin';
        foreach ($breadcrumbs as $breadcrumb) {
            if ($breadcrumb === 'admin') {
                $this->title = __('routeNames.' . $breadcrumb . '.index');
                $this->breadcrumbs[$breadcrumb . '.index'] = $this->title;
            } elseif ((int)$breadcrumb === 0) {
                $link .= ".$breadcrumb";
                $this->title = __('routeNames.' . $link);
                $this->breadcrumbs[$link] = $this->title;
            }
        }
//        array_pop( $this->breadcrumbs);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumbs');
    }
}
