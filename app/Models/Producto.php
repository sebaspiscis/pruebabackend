<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Producto extends Model implements AuditableContract
{
    use HasFactory;
    use HasUuids;
    use Auditable;
    
    protected $table = 'productos';

    public $incrementing = false;
    protected $keytype = 'string';

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'stock',
        'estado',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this ->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
