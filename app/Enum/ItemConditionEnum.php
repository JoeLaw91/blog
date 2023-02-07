<?php

namespace App\Enum;

enum ItemConditionEnum:string
{
    case BRAND_NEW = 'brand_new';
    case LIKE_NEW = 'like_new';
    case LIGHTLY_USED = 'lightly_used';
    case WELL_USED = 'well_used';
    case HEAVILY_USED = 'heavily_used';
}
