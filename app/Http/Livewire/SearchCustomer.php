<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class SearchCustomer extends Component
{
    public $term = "";

    public function render()
    {
        sleep(1);
        $users = Customer::search($this->term)->paginate(10);

        $data = [
            'users' => $users,
        ];

        return view('livewire.search-user', $data);
    }
}
