<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class CategorySearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'filterByCategory' => 'filterByCategory'
    ];

    public $category;
    public $categoryId;
    public $ucFirst;
    public $search;
    public $filters = [];
    public $perPage = 20;

    public $sortDirection = 'desc';
    public $field;
    public $min;
    public $max;

    public function mount()
    {
        $this->min = Product::min('price');
        $this->max = Product::max('price');

    }

    /*
     * Reset pagination when doing a search
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $segment = Request::segment(count(Request::segments()));
        $ucFirst = str_replace('', '', strtolower($segment));
        $categoryId = \request()['categoryId'];
        $categoryName = \request()['categoryName'];
        $min_price = Product::min('price');
        $max_price = Product::max('price');

        if ($categoryId && $categoryName) {
            $products = Product::query()->with('categories')
                ->leftJoin('category_product', 'category_product.product_id', '=', 'products.id')
                ->leftJoin('categories', 'categories.id', '=', 'category_product.category_id')
                ->select('products.*', 'categories.*', 'category_product.*')
                ->where([
                    ['category_product.category_id', '=', $categoryId],
                ]);
            $uniqueCategories = $this->getCategories();

            $this->applySearchFilterParameters($products);
            $this->applyCategoryFilter($products);
            $products = $products
                ->where('published', '=', '1')
                ->whereBetween('price', [$this->min, $this->max])
                ->paginate($this->perPage);
//            dd($products);
            return view('livewire.category-search', [
                'products' => $products,
                'uniqueCategories' => $uniqueCategories,
                'min_price' => $min_price,
                'max_price' => $max_price,
                'ucFirst' => $ucFirst
            ]);
        }
        $products = Product::with('categories')->withCount('categories');
        $uniqueCategories = $this->getCategories();

        $this->applySearchFilter($products);

        $this->applyCategoryFilter($products);
        $products = $products
            ->where('published', '=', '1')
            ->whereBetween('price', [$this->min, $this->max])
            ->paginate($this->perPage);
//        dd($products);
        return view('livewire.category-search', [
            'products' => $products,
            'uniqueCategories' => $uniqueCategories,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'ucFirst' => $ucFirst
        ]);
    }


    public function filterByCategory($category)
    {
        if (in_array($category, $this->filters)) {
            $ix = array_search($category, $this->filters);

            unset($this->filters[$ix]);
        } else {
            $this->filters[] = $category;

            //Reset pagination, otherwise filter won't work
            $this->resetPage();
        }
    }

    public function sortByColumn()
    {
        $sort = explode("|", $this->sort);

        if (!$sort[0]) {
            return;
        }

        return $sort[0];
    }

    public function sortDirection()
    {
        $sort = explode("|", $this->sort);

        return $sort[1] ?? 'asc';
    }

    private function applySearchFilter($products)
    {
        if ($this->search) {
            return $products->whereRaw("item_name LIKE \"%$this->search%\"")
                ->orWhereRaw("item_code LIKE \"%$this->search%\"");

        }

        return null;
    }

    private function applySearchFilterParameters($products)
    {
        if ($this->search) {
            return $products
                ->whereRaw("category_id LIKE \"%$this->categoryId%\"");


        }

        return null;
    }

    private function applyCategoryFilter($products)
    {
        if ($this->filters) {

            foreach ($this->filters as $filter) {
                $products->whereHas('categories', function ($query) use ($filter) {
                    $query->where('categories.id', $filter);
                });
            }
        }

        return null;
    }

    private function getCategories()
    {
        return Category::withCount('products')
            ->having('products_count', '>', 2)
            ->orderBy('products_count', 'DESC')
            ->get();
    }

    public function sortBy($columnName)
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }


    public function loadMore20()
    {
        $this->perPage = 20;
    }

    public function loadMore50()
    {
        $this->perPage = 50;
    }

    public function loadMore100()
    {
        $this->perPage = 100;
    }


}
