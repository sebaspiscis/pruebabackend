<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use OwenIt\Auditing\Models\Audit as AuditModel;

class Audit extends AuditModel
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
}