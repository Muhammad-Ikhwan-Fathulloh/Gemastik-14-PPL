<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Komentarsolusi;
use Livewire\WithPagination;

class Komentarsolusis extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

	public $id_solusi;
	public $komentarsumbangide;
	
	public $ids;

	public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->id_solusi = '';
        $this->komentarsumbangide = '';
    }

    public function SimpanData(){
        Komentarsolusi::create([
        	'id_user' => Auth::user()->id,
            'id_solusi' => $this->id_solusi,
            'komentar' => $this->komentarsumbangide,
        ]);
        
		$this->clearform();
        $this->alert('success', 'Berhasil Terkirim!', [
                  'position' =>  'center', 
                  'timer' =>  3000,  
                  'toast' =>  false, 
                  'text' =>  '', 
                  'confirmButtonText' =>  'Ok', 
                  'cancelButtonText' =>  'Cancel', 
                  'showCancelButton' =>  false, 
                  'showConfirmButton' =>  false, 
            ]);
    }

    public function deleteData($id){
		Komentarsolusi::where('id',$id)->delete();
		$this->alert('success', 'Berhasil Dihapus!', [
                  'position' =>  'center', 
                  'timer' =>  3000,  
                  'toast' =>  false, 
                  'text' =>  '', 
                  'confirmButtonText' =>  'Ok', 
                  'cancelButtonText' =>  'Cancel', 
                  'showCancelButton' =>  false, 
                  'showConfirmButton' =>  false, 
            ]);
	}

    public function render()
    {
        return view('livewire.komentarsolusi', [
            'komentarsolusik' => Komentarsolusi::where('komentarsolusis.id_user', Auth::user()->id)->where('komentar', 'like', '%'.$this->search.'%')->Join('users', 'komentarsolusis.id_user', '=', 'users.id')->Join('solusis', 'komentarsolusis.id_solusi', '=', 'solusis.id')->orderBy('komentarsolusis.id','DESC')->paginate(5),
        ])->layout('komentar.v_solusi');
    }
}
