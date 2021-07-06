<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // Fungsi __contruct() dapat kita gunakan untuk passing data
    public $title;
    public $subtitle;
    public $linkBaru;
    public $link;
    public $subtitleBaru;
    public function __construct($title, $link, $subtitle, $linkBaru, $subtitleBaru)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->link = $link;
        $this->linkBaru = $linkBaru;
        $this->subtitleBaru = $subtitleBaru;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    // sedangkan fungsi render() untuk memanggil atau menampilkan file view yang telah dibuatkan laravel tadi.
    public function render()
    {
        return view('components.breadcrumb');
    }
}
