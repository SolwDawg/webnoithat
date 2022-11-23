<?php

    namespace App\Models;

    use Cviebrock\EloquentSluggable\Sluggable;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Brand extends Model
    {
        use HasFactory, Sluggable;

        protected $table = 'brands';

        protected $fillable = [
            'name',
            'slug',
            'status',
            'category_id',
        ];

        public function sluggable(): array
        {
            return [
                'slug' => [
                    'source' => 'name'
                ]
            ];
        }

        public function category()
        {
            return $this->belongsTo(Category::class, 'category_id', 'id');
        }
    }
