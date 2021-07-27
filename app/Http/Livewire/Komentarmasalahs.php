<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Komentarmasalah;
use Livewire\WithPagination;

class Komentarmasalahs extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

	public $id_permasalahan;
	public $komentarpermasalahan;
	
	public $ids;

	public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->id_permasalahan = '';
        $this->komentarpermasalahan = '';
    }

    public function SimpanData(){
        Komentarmasalah::create([
        	'id_user' => Auth::user()->id,
            'id_permasalahan' => $this->id_permasalahan,
            'komentar' => $this->komentarpermasalahan,
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
		Komentarmasalah::where('id',$id)->delete();
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
        return view('livewire.komentarmasalah', [
            'komentarmasalahk' => Komentarmasalah::where('komentarmasalahs.id_user', Auth::user()->id)->where('komentar', 'like', '%'.$this->search.'%')->Join('users', 'komentarmasalahs.id_user', '=', 'users.id')->Join('masalahs', 'komentarmasalahs.id_permasalahan', '=', 'masalahs.id')->orderBy('komentarmasalahs.id','DESC')->paginate(5),
            'komentarmasalahs' => Komentarmasalah::get(),
        ])->layout('komentar.v_masalah');
    }
}
