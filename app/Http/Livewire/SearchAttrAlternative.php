<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchAttrAlternative extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'filterByCategory' => 'filterByCategory',
        'filterByAttribute' => 'filterByAttribute'

    ];

    public $category;
    public $attribute;
    public $search;
    public $filters = [];
    public $perPage = 20;
    public $sort = 'created_at|desc';
    public $sortColumnName = 'created_at';
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
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        $products = Product::with(['categories', 'attributes'])->withCount(['categories', 'attributes']);

        $uniqueCategories = $this->getCategories();
        $uniqueAttributes = $this->getAttributes();

        $this->applySearchFilter($products->orderBy($this->sortColumnName, $this->sortDirection));

        $this->applyCategoryFilter($products);

        $products = $products->orderBy($this->sortByColumn(), $this->sortDirection())
            ->where('published', '=', '1')
            ->whereBetween('price', [$this->min, $this->max])
            ->paginate($this->perPage);
        $input = \request()->input('attributes');
//        dd($this->attributes);
//        if(!empty($this->attributes)) {
//
//        }
//        $array_of_item_ids = $input['attributes'];

        return view('livewire.search', [
            'products' => $products,
            'uniqueCategories' => $uniqueCategories,
            'uniqueAttributes' => $uniqueAttributes,
            'min_price' => $min_price,
            'max_price' => $max_price
        ]);
    }

    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
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

    public function filterByAttribute($attribute)
    {
        if (in_array($attribute, $this->filters)) {
            $ix = array_search($attribute, $this->filters);

            unset($this->filters[$ix]);
        } else {
            $this->filters[] = $attribute;

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

    private function applyCategoryFilter($products)
    {
        if ($this->filters) {

            foreach ($this->filters as $filter) {
                $products->whereHas('categories', function ($query) use ($filter) {
                    $query->where('categories.id', $filter);
                });
            }
            foreach ($this->filters as $filters) {
                $products->whereHas('attributes', function ($query) use ($filters) {
                    $query->where('attributes.id', $filters);
                });
            }
        }

        return null;


    }


    private
    function getCategories()
    {
        return Category::withCount('products')
            ->having('products_count', '>', 0)
            ->orderBy('products_count', 'DESC')
            ->get();
    }

    private
    function getAttributes()
    {
        return Attribute::withCount('products')
            ->having('products_count', '>', 0)
            ->orderBy('products_count', 'DESC')
            ->get();
    }

    public
    function sortBy($columnName)
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public
    function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }


    public
    function loadMore20()
    {
        $this->perPage = 20;
    }

    public
    function loadMore50()
    {
        $this->perPage = 50;
    }

    public
    function loadMore100()
    {
        $this->perPage = 100;
    }

}
