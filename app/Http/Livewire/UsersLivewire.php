<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";

    public User $user;

    public $edit=false;

    protected $rules=[
        'user.name'=>'required',
        'user.email'=>'required',
        'user.password'=>'required'
    ];

    protected $messages=[
        'user.name.required'=>'Malumot kitilsin'
    ];

    public function mount()
    {
        $this->user= new User();
    }

    public $name;
    public $email;
    public $password;

    public function store()
    {
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),
        ]);
    }
    public function delete(User $user)
    {
        $user->delete();
    }
    public function edit(User $user){
        $this->user= $user;
        $this->edit=true;
    }
    public function editUser($id)
    {
        $user = User::find($id);
        $this->user = $user;
        $this->emit('editUser', $id);
    }
    public function updateUser($id){
        $this->user->update([
            'name'=>$this->user->name,
            'email'=>$this->user->email,
            'password'=>bcrypt( $this->user->password)
        ]);
    }

    public function render()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('livewire.users-livewire',compact('users'));
    }
}
