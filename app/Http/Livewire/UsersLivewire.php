<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";

    public $users;
    public function mount() {
        $this->users=User::paginate(10);
    }

    public function render()
    {
        return view('livewire.users-livewire',['users'=>$this->users]);
    }
}
