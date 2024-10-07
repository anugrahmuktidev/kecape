<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    public $id, $name, $email, $no_hp, $password, $selected_id;
    public $isOpen = false; // Variabel untuk kontrol modal

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'no_hp' => 'required',
        'password' => 'required',
    ];

    public function render()
    {
        // Menampilkan semua pengguna dengan role 'admin'
        $users = UserModel::where('role', 'admin')->get();

        return view('livewire.user', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true; // Membuka modal
    }

    public function store()
    {
        $validatedData = $this->validate();

        // Menggunakan updateOrCreate untuk menangani create dan update
        UserModel::updateOrCreate(['id' => $this->selected_id], [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'no_hp' => $validatedData['no_hp'],
            'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : null,
            'role' => 'admin',
            'is_first_login' => false,
        ]);

        // Flash message setelah operasi
        session()->flash('message', $this->selected_id ? 'User updated successfully.' : 'User created successfully.');

        $this->closeModal(); // Menutup modal setelah operasi
        $this->resetInputFields();
        $this->render(); // Refresh data setelah operasi
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->no_hp = $user->no_hp;
        $this->isOpen = true; // Membuka modal untuk edit
    }

    public function delete($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        // Flash message setelah delete
        session()->flash('message', 'User deleted successfully.');

        $this->render(); // Refresh data setelah penghapusan
    }

    public function closeModal()
    {
        $this->isOpen = false; // Menutup modal
    }

    private function resetInputFields()
    {
        // Reset semua input
        $this->selected_id = null;
        $this->name = '';
        $this->email = '';
        $this->no_hp = '';
        $this->password = '';
    }
}
