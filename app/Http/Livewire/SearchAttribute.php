<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithPagination;

class SearchAttribute extends Component
{
    use WithPagination;

//    protected $paginationTheme = 'bootstrap';

    public $searchTermAttr;
    public $perPage = 10;
    public $filters = [];
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
        $itemsAttributes = Attribute::with('products')->withCount('products');

        $this->applySearchFilter($itemsAttributes->orderBy($this->sortColumnName, $this->sortDirection));


        $itemsAttributes = $itemsAttributes->orderBy($this->sortByColumn(), $this->sortDirection())
            ->paginate($this->perPage);

        return view('livewire.search-attribute', [
            'itemsAttributes' => $itemsAttributes
        ]);
    }

    public function updateOrder($list)
    {

        foreach ($list as $itemsAttribute) {

            Attribute::find((int)$itemsAttribute['value'])->update(['id' => (int)$itemsAttribute['order']]);
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

    private function applySearchFilter($itemsAttributes)
    {
        if ($this->searchTermAttr) {
            return $itemsAttributes->whereRaw("name LIKE \"%$this->searchTermAttr%\"");

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
