<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class AddbBijoux extends Model
{
    use SoftDeletes;

    public $table = 'addb_bijouxes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'bijoutier_id',
        'currency_id',
        'photo1',
        'photo2',
        'photo3',
        'description',
        'prix',
        'quantity',
        'verified',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }

    public function bijoutier()
    {
        return $this->belongsTo(Bijoutier::class, 'bijoutier_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
