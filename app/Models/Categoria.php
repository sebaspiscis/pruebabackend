<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Categoria extends Model implements AuditableContract
{
    use HasFactory;
    use HasUuids;
    use Auditable;

    protected $table = 'categorias';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id', 'id');
    }
}
