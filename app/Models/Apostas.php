<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Apostas extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'nome',
        'status',
        'valor',
        'user_id',
    ];

    protected $table = "apostas";
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = Uuid::uuid4();
        });
    }

    // no modelo Users
    public function Users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
