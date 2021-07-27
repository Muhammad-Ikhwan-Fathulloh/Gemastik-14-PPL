<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kategoricollabs;
use Livewire\WithPagination;

class Kategorikolaborasi extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

	public $kategori_collabs;

	public $ids;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->kategori_collabs = '';
    }

    public function SimpanData(){
    	$this->validate([
            'kategori_collabs' => 'required',
        ], [
            'kategori_collabs.required' => 'Wajib diisi !!',
        ]);

        Kategoricollabs::create([
            'kategori_collabs' => $this->kategori_collabs,
        ]);
        
		$this->clearform();
        $this->alert('success', 'Berhasil Ditambah!', [
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

    public function detailData($id){
		$Kategorik = Kategoricollabs::where('id',$id)->first();
		$this->ids = $Kategorik->id;
		$this->kategori_collabs = $Kategorik->kategori_collabs;
	}

	public function UbahData(){
    	$this->validate([
            'kategori_collabs' => 'required',            
        ], [
            'kategori_collabs.required' => 'Wajib diisi !!',
        ]);

        Kategoricollabs::where('id', $this->ids)->update([
            'kategori_collabs' => $this->kategori_collabs,
        ]);
        $this->alert('success', 'Berhasil Diubah!', [
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
		Kategoricollabs::where('id',$id)->delete();
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
        return view('livewire.kategorikolaborasi', [
        	'kategori' => Kategoricollabs::where('kategori_collabs', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
        ])->layout('kategori.v_kategori');
    }
}
