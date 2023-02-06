<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'filterByCategory' => 'filterByCategory'
    ];

    public $category;
    public $searchTerm;
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
     * Reset pagination when doing a searchTerm
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        $items = Product::with('categories')->withCount('categories');

        $uniqueCategories = $this->getCategories();

        $this->applySearchFilter($items->orderBy($this->sortColumnName, $this->sortDirection));

        $this->applyCategoryFilter($items);

        $items = $items->orderBy($this->sortByColumn(), $this->sortDirection())
            ->where('published', '=', '1')
            ->whereBetween('price', [$this->min, $this->max])
            ->paginate($this->perPage);

        return view('livewire.admin-product', [
//            'products' => Product::orderBy('created_at')->get(),
            'items' => $items,
            'uniqueCategories' => $uniqueCategories,
            'min_price' => $min_price,
            'max_price' => $max_price
        ]);
    }

    public function updateOrder($list) {

        foreach($list as $item) {

            Product::find((int)$item['value'])->update(['id' => (int)$item['order']]) ;
        }


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

    private function applySearchFilter($items)
    {
        if ($this->searchTerm) {
            return $items->whereRaw("item_name LIKE \"%$this->searchTerm%\"");

        }

        return null;
    }

    private function applyCategoryFilter($items)
    {
        if ($this->filters) {

            foreach ($this->filters as $filter) {
                $items->whereHas('categories', function ($query) use ($filter) {
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
