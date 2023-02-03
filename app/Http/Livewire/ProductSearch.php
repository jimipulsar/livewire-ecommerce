<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;
    public $product;
    public $search;
    public $perPage = 3;
    protected $queryString = ['search'];

    public function render()
    {
        $products = Product::with('categories')->where('published', '=', '1')->withCount('categories');
        if ($this->search) {
            $this->applySearchFilter($products);
        }
        $products = $products->where('published', '=', '1')->paginate($this->perPage);

        return view('livewire.product-search', ['products' => $products]);

    }

    private function applySearchFilter($products)
    {
        if ($this->search) {
            return $products->whereRaw("item_name LIKE \"%$this->search%\"")
                ->orWhereRaw("item_code LIKE \"%$this->search%\"");

        }

        return null;
    }
}
