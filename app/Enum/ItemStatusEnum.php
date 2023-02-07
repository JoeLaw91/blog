<?php

namespace App\Enum;

enum ItemStatusEnum:string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case SOLD = 'sold';
    case DELETED = 'deleted';
    case PAUSED = 'paused';
}
