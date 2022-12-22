<?php

    namespace App\Http\Livewire\Frontend\Product;

    use App\Models\Cart;
    use App\Models\Product;
    use App\Models\Wishlist;
    use Illuminate\Support\Facades\Auth;
    use Livewire\Component;
    use Livewire\WithPagination;

    class Index extends Component
    {
        public $products, $category, $brandInputs = [], $priceInput, $product;


        protected $queryString = [
            'brandInputs' => ['except' => '', 'as' => 'brand'],
            'priceInput' => ['except' => '', 'as' => 'price'],
        ];

        public function addToWishList($productId)
        {
            if (Auth::check()) {
                if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                    session()->flash('message', 'Already added to wishlist');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Already added to wishlist',
                        'type' => 'warning',
                        'status' => 409
                    ]);
                    return false;
                } else {
                    WishList::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $productId
                    ]);
                    $this->emit('wishlistAddedUpdated');
                    session()->flash('message', 'Wishlist added successfully');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Wishlist added successfully',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }

            } else {
                session()->flash('message', 'Please Login to continue');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Please Login to continue',
                    'type' => 'info',
                    'status' => 401
                ]);
                return false;
            }
        }

        public function addToCart(int $productId)
        {
            if (Auth::check()) {
                if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                    if ($this->product->productColors()->count() > 1) {
                        if ($this->prodColorSelectedQuantity != null) {
                            if (Cart::where('user_id', auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_color_id', $this->productColorId)
                                ->exists()) {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Already Added',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            } else {
                                $productColor = $this->product->productColors()->where('id',
                                    $this->productColorId)->first();
                                if ($productColor->quantity > 0) {
                                    if ($productColor->quantity > $this->quantityCount) {
                                        Cart::create([
                                            'user_id' => auth()->user()->id,
                                            'product_id' => $productId,
                                            'product_color_id' => $this->productColorId,
                                            'quantity' => $this->quantityCount,
                                        ]);
                                        $this->emit('CartAddedUpdated');
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => 'Product Added to Cart',
                                            'type' => 'success',
                                            'status' => 200
                                        ]);
                                    } else {
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => 'Only '.$productColor->quantity.' Quantity Available',
                                            'type' => 'warning',
                                            'status' => 404
                                        ]);
                                    }
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Out of Stock',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Select your product colors',
                                'type' => 'info',
                                'status' => 401
                            ]);
                        }
                    } else {
                        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Added',
                                'type' => 'success',
                                'status' => 200
                            ]);
                        } else {
                            if ($this->product->quantity > 0) {
                                if ($this->product->quantity > $this->quantityCount) {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'quantity' => $this->quantityCount,
                                    ]);

                                    $this->emit('CartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product Added to Cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only '.$this->product->quantity.' Quantity Available',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of Stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    }
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Product Does not exists',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Please Login to continue',
                    'type' => 'info',
                    'status' => 401
                ]);
            }
        }

        public function mount($category)
        {
            $this->category = $category;
        }

        public function render()
        {
            $this->products = Product::where('category_id', $this->category->id)
                ->when($this->brandInputs, function ($q) {
                    $q->whereIn('brand', $this->brandInputs);
                })
                ->when($this->priceInput, function ($q) {
                    $q->when($this->priceInput == 'high-to-low', function ($q2) {
                        $q2->orderBy('selling_price', 'DESC');
                    })->when($this->priceInput == 'low-to-high', function ($q2) {
                        $q2->orderBy('selling_price', 'ASC');
                    });
                })
                ->where('status', '0')
                ->get();

            return view('livewire.frontend.product.index', [
                'products' => $this->products,
                'category' => $this->category,
            ]);
        }
    }
