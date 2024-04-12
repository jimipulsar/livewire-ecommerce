<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProduct extends Component
{
//    public function __construct()
//    {
//        abort_if(auth()->guard('admin')->check(), 401);
//    }
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

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

        $items = Product::with('categories')->withCount('categories');

//        Product::query()
//            ->leftJoin('category_product', 'category_product.product_id', '=', 'products.id')
//            ->leftJoin('categories', 'categories.id', '=', 'category_product.category_id')
//            ->select('products.*', 'categories.*', 'category_product.*')
//            ->where([
//                ['category_product.product_id', '=', $id],
//            ])
//            ->first()->toArray();
        $this->applySearchFilter($items->orderBy($this->sortColumnName, $this->sortDirection));

        $items = $items->orderBy($this->sortByColumn(), $this->sortDirection())
            ->paginate($this->perPage);

        return view('livewire.admin-product', ['lang' => app()->getLocale()])->with(array(
            'items' => $items
        ));
    }

    public function updateOrder($list) {

        foreach($list as $item) {

            Product::find((int)$item['value'])->update(['id' => (int)$item['order']]) ;
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
            return $items->whereRaw("item_name LIKE \"%$this->searchTerm%\"")
            ->orWhereRaw("item_code LIKE \"%$this->searchTerm%\"");

        }

        return null;
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

}
