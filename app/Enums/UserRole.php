<?php

namespace App\Enums;

enum UserRole: string
{
    case SuperAdmin = 'super_admin';
    case Dkm = 'dkm';
    case Public = 'public';
}
