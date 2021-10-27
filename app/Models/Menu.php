<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * Get the menuItems for the menu.
     */
    public function menuItems()
    {
        return $this->hasMany(MenuItems::class);
    }
}
