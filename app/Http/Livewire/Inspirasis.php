<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Inspirasi;
use App\Models\User;
use Livewire\WithPagination;

class Inspirasis extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_users;
	public $inspirasi;
	public $keterangan;

	public $ids;

	public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->id_users = '';
        $this->inspirasi = '';
        $this->keterangan = '';
    }

    public function SimpanData(){
    	$this->validate([
            'id_users' => 'required',
            'inspirasi' => 'required',
            'keterangan' => 'required',
        ], [
            'id_users.required' => 'Wajib diisi !!',
            'inspirasi.required' => 'Wajib diisi !!',
            'keterangan.required' => 'Wajib diisi !!',
        ]);

        Inspirasi::create([
        	'id_user' => Auth::user()->id,
            'id_users' => $this->id_users,
            'inspirasi' => $this->inspirasi,
            'keterangan' => $this->keterangan,
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
		$Inspirasik = Inspirasi::where('id',$id)->first();
		$this->ids = $Inspirasik->id;
		$this->id_users = $Inspirasik->id_users;
		$this->inspirasi = $Inspirasik->inspirasi;
		$this->keterangan = $Inspirasik->keterangan;
	}

	public function UbahData(){
		$this->validate([
            'id_users' => 'required',
            'inspirasi' => 'required',
            'keterangan' => 'required',
        ], [
            'id_users.required' => 'Wajib diisi !!',
            'inspirasi.required' => 'Wajib diisi !!',
            'keterangan.required' => 'Wajib diisi !!',
        ]);

        Inspirasi::where('id', $this->ids)->update([
        	'id_user' => Auth::user()->id,
            'id_users' => $this->id_users,
            'inspirasi' => $this->inspirasi,
            'keterangan' => $this->keterangan,
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
		Inspirasi::where('id',$id)->delete();
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
        return view('livewire.inspirasi', [
        	'inspirasib' => Inspirasi::where('keterangan', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
            'userb' => User::get(),
        ])->layout('inspiration.v_inspirasi');
    }
}
