<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class MenuController extends Controller implements FilterInterface
{
    public function transform($item, Builder $builder)
	{
		if (! $this->isVisible($item)) {
			return false;
		}

		return $item;
    }
    
    protected function isVisible($item) {
        if (isset($item['roles'])) {
            if (Auth::user()->hasAnyRole($item['roles'])) {
                return true;
            } else {
                return false;
            }
        }
    }
}


