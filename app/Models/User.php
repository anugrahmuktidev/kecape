<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_hp',
        'tanggal_lahir',
        'berat_badan',
        'tinggi_badan',
        'jenis_kelamin',
        'pendidikan',
        'pekerjaan',
        'pekerjaan_lain',
        'alamat',
        'rt',
        'no_rumah',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'role',
        'is_first_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'tanggal_lahir' => 'date', // Meng-cast tanggal_lahir sebagai date
    ];

    /**
     * Check if the user has a password set.
     *
     * @return bool
     */
    public function hasPassword()
    {
        return !empty($this->password);
    }

    /**
     * Find a user by their phone number.
     *
     * @param string $no_hp
     * @return User|null
     */
    public static function authenticateByNoHp($no_hp)
    {
        return self::where('no_hp', $no_hp)->first();
    }
}
