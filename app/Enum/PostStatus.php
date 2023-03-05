<?php

namespace App\Enum;

enum PostStatus: string
{
    case IN_PROCESS = 'in_process';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}