<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    public function addStatusLabelAttribute() {
        return match($this->status) {
            self::STATUS_REJECTED => 'Ditolak',
            self::STATUS_APPROVED => 'Disetujui',
            default => 'Menunggu Verifikasi'
        };
    }

    // Relasi User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //
    protected $fillable = [
        'title',
        'image',
        'description',
        'status'
    ];
}
