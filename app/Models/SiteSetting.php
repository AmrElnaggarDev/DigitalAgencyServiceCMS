<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = 'site_settings';

    protected $fillable = [
        'site_name',
        'logo_header',
        'logo_footer',
        'logo_mobile',
        'favicon',
        'page_banner',
        'preloader_status',
        'preloader_icon',
        'preloader_logo',
        'footer_text',
        'copyright_text',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'instagram_link',
        'layout_direction',
    ];
}
