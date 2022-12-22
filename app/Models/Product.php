<?php

    namespace App\Models;

    use Cviebrock\EloquentSluggable\Sluggable;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        use HasFactory, Sluggable;

        protected $table = 'products';

        protected $fillable = [
            'category_id',
            'name',
            'slug',
            'brand',
            'small_description',
            'description',
            'original_price',
            'selling_price',
            'quantity',
            'trending',
            'featured',
            'status',
            'meta_title',
            'meta_keyword',
            'meta_description',
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

        public function productImages()
        {
            return $this->hasMany(ProductImage::class, 'product_id', 'id');
        }

        public function productColors()
        {
            return $this->hasMany(ProductColor::class, 'product_id', 'id');
        }

        public function comments() {
            return $this->hasMany(Comment::class)->whereNull('parent_id');
        }
    }
