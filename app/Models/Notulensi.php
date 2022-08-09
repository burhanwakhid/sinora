<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Notulensi extends Model
{
    use HasFactory, Sortable;

    protected $table = 'notulensi';

    protected $fillable = [
        'kegiatan',
        'tanggal',
        'waktu',
        'tempat',
        'pemimpin_kegiatan',
        'peserta',
        'dokumentasi',
        'notulensi',
        'id_user',
        'status',
    ];

    public $sortable = ['status',
                        'tanggal'];

    /**
     * Get the notulensi that owns the user.
     */
    public function user() {
        return $this->belongsTo(User::class, 'id_user');

    }

    
}
