<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'telefono', 'email', 'nivel_estudios','cv_id', 'fechayhora_cita', 'user_id'];

    protected function fechayhoraCita(): Attribute
{
    return Attribute::make(
        get: fn ($value) => Carbon::parse($value),
    );
}
 public function user() {
    return $this->belongsTo(User::class, 'user_id');
 }
}
