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

        public function city()
        {
            return $this->belongsTo(City::class, 'fee_city', 'matp');
        }

        public function province()
        {
            return $this->belongsTo(Province::class, 'fee_province', 'maqh');
        }

        public function wards()
        {
            return $this->belongsTo(Wards::class, 'fee_wards', 'xaid');
        }
    }
