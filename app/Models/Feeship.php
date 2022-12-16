<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Feeship extends Model
    {
        use HasFactory;

        protected $table = 'fee_ship';

        protected $fillable = [
            'fee_city',
            'fee_province',
            'fee_wards',
            'fee_feeship'
        ];
    }
