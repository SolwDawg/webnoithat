<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Cviebrock\EloquentSluggable\Sluggable;

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
