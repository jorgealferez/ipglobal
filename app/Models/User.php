<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="User"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", readOnly="false", description="Nombre del usuario", example="John Doe"),
 * @OA\Property(property="email", type="email", readOnly="false", description="Texto de la publicación", example="john.doe@email.com"),
 * @OA\Property(property="address", type="json", readOnly="false", description="Json de la dirección"),
 * @OA\Property(property="phone", type="string", readOnly="false", description="Teléfono", example="+34601444555"),
 * @OA\Property(property="website", type="string", readOnly="false", description="Página web", example="http://example.com"),
 * @OA\Property(property="company", type="json", readOnly="false", description="Empresa")
 * )
 *
 * Class User
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'username',
        'email',
        'address',
        'phone',
        'website',
        'company',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'address' => 'array',
        'company' => 'array'
    ];

}
