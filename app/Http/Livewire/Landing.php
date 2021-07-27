<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Inspirasi;
use App\Models\Solusi;
use App\Models\User;
use Livewire\WithPagination;


class Landing extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.landing', [
        	'inspirasib' => Inspirasi::where('keterangan', 'like', '%'.$this->search.'%')->Join('users', 'inspirasis.id_users', '=', 'users.id')->orderBy('inspirasis.id','DESC')->paginate(5),
            'userb' => User::get(),
            'project' => Solusi::get(),
        ])->layout('landing');
    }
}
