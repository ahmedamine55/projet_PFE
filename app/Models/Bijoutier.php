<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Bijoutier extends Model
{
    use SoftDeletes;

    public $table = 'bijoutiers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_PAYEMENT_SELECT = [
        'monthly'   => 'par mois',
        'trimestre' => 'par trimestre',
        'yearly'    => 'par ans',
    ];

    protected $fillable = [
        'nom',
        'prenom',
        'mobile',
        'photo1',
        'photo2',
        'photo3',
        'description',
        'facebook',
        'instagram',
        'twitter',
        'web',
        'email',
        'password',
        'type_payement',
        'paye_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function paye()
    {
        return $this->belongsTo(Paye::class, 'paye_id');
    }
}
