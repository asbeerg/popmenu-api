<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    /**
     * Get the menu that owns the menu item.
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
