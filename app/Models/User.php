<?php

    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use App\Models\UserDetail as UserDetailAlias;
    use Illuminate\Database\Eloquent\Casts\Attribute;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable
    {
        use HasApiTokens, HasFactory, Notifiable;

        protected $fillable = [
            'name',
            'email',
            'phone',
            'address',
            'profile_image',
            'pin_code',
            'password',
            'role',
            'provider',
            'provider_id',
        ];

        public function UserDetail(): \Illuminate\Database\Eloquent\Relations\HasOne
        {
            return $this->hasOne(UserDetailAlias::class, 'user_id', 'id');
        }

        protected $hidden = [
            'password',
            'remember_token',
        ];

        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        protected function role(): Attribute
        {
            return new Attribute(
                get: fn($value) => ["user", "super-admin", "manager"][$value],
            );
        }
    }
