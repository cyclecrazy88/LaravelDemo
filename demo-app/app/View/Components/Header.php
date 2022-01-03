<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class Header extends Component
{
	public $MenuList = Array();
	public $activeItem = "";
	
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
		$activeInputItem = app('request')->input("name");
		
		$menuList = DB::select("select name from Menu_Items;");
		$this->MenuList = $menuList;
		$this->activeItem = $activeInputItem;
        return view('components.header');
    }
}
