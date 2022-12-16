<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    /**
     * @method static create()
     * @method static where(string $string, mixed $id)
     */
    class Banner extends Model
    {
        use HasFactory;

        protected $table = 'banners';

        protected $fillable = [
            'title',
            'url',
            'image',
            'status',
        ];
}
