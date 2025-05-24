<?php

namespace App\Models\Authentication;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MfaToken extends Model
{
    /** @use HasFactory<\Database\Factories\MfaTokenFactory> */
    use HasFactory;
}
