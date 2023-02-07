<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardOrders extends Component
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



    /*
     * Reset pagination when doing a searchTerm
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $notifications = DB::table('notifications')->orderBy('created_at', 'DESC')->get();
        $customers = Customer::all();
        $products = DB::table('products')->count();
        $orders = Order::with('items')->withCount('items');


        $this->applySearchFilter($orders->orderBy($this->sortColumnName, $this->sortDirection));

        $this->applyCategoryFilter($orders);

        $orders = $orders->orderBy($this->sortByColumn(), $this->sortDirection())
            ->paginate($this->perPage);

        return view('livewire.dashboard-orders', [
//            'products' => Product::orderBy('created_at')->get(),
            'orders' => $orders
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
            return $items->whereRaw("order_number LIKE \"%$this->searchTerm%\"")
                ->orWhereRaw("status LIKE \"%$this->searchTerm%\"");

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
}
