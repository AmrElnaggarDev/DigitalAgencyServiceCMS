<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPageItem extends Model
{
    protected $table = 'contact_page_items';

    protected $fillable = ['email', 'phone', 'address', 'map_iframe'];
}
