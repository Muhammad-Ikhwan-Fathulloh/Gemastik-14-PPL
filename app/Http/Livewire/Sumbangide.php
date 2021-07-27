<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Pesan;
use App\Models\Solusi;
use App\Models\Masalah;
use App\Models\Komentarsolusi;
use App\Models\Kategoricollabs;
use Livewire\WithPagination;

class Sumbangide extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_permasalahan;
	public $deskripsi_solusi;
	public $deskripsi_penerapan;
	public $harapan;
	public $file_solusi;
	public $file_penerapan;
	public $feedback;
	public $kategori;

	public $ids;

	public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
		$this->id_permasalahan = '';
        $this->deskripsi_solusi = '';
        $this->deskripsi_penerapan = '';
        $this->harapan = '';
        $this->file_solusi = '';
        $this->file_penerapan = '';
        $this->feedback = '';
        $this->kategori = '';
    }

    public function SimpanData(){
    	$this->validate([
    		'id_permasalahan' => 'required',
            'deskripsi_solusi' => 'required',
            'deskripsi_penerapan' => 'required',
            'harapan' => 'required',
            'file_solusi' => 'required',
            'file_penerapan' => 'required',
            'feedback' => 'required',
            'kategori' => 'required',
        ], [
        	'id_permasalahan.required' => 'Wajib diisi !!',
            'deskripsi_solusi.required' => 'Wajib diisi !!',
            'deskripsi_penerapan.required' => 'Wajib diisi !!',
            'harapan.required' => 'Wajib diisi !!',
            'file_solusi.required' => 'Wajib diisi !!',
            'file_penerapan.required' => 'Wajib diisi !!',
            'feedback.required' => 'Wajib diisi !!',
            'kategori.required' => 'Wajib diisi !!',
        ]);

        Solusi::create([
        	'id_user' => Auth::user()->id,
        	'id_permasalahan' => $this->id_permasalahan,
            'deskripsi_solusi' => $this->deskripsi_solusi,
            'deskripsi_penerapan' => $this->deskripsi_penerapan,
            'harapan' => $this->harapan,
            'file_solusi' => $this->file_solusi,
            'file_penerapan' => $this->file_penerapan,
            'feedback' => $this->feedback,
            'kategori' => $this->kategori,
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
		$Solusik = Solusi::where('id',$id)->first();
		$this->ids = $Solusik->id;
		$this->id_permasalahan = $Solusik->id_permasalahan;
		$this->deskripsi_solusi = $Solusik->deskripsi_solusi;
		$this->deskripsi_penerapan = $Solusik->deskripsi_penerapan;
		$this->harapan = $Solusik->harapan;
		$this->file_solusi = $Solusik->file_solusi;
		$this->file_penerapan = $Solusik->file_penerapan;
		$this->feedback = $Solusik->feedback;
		$this->kategori = $Solusik->kategori;
	}

    public function UbahData(){
    	$this->validate([
    		'id_permasalahan' => 'required',
            'deskripsi_solusi' => 'required',
            'deskripsi_penerapan' => 'required',
            'harapan' => 'required',
            'file_solusi' => 'required',
            'file_penerapan' => 'required',
            'feedback' => 'required',
            'kategori' => 'required',
        ], [
        	'id_permasalahan.required' => 'Wajib diisi !!',
            'deskripsi_solusi.required' => 'Wajib diisi !!',
            'deskripsi_penerapan.required' => 'Wajib diisi !!',
            'harapan.required' => 'Wajib diisi !!',
            'file_solusi.required' => 'Wajib diisi !!',
            'file_penerapan.required' => 'Wajib diisi !!',
            'feedback.required' => 'Wajib diisi !!',
            'kategori.required' => 'Wajib diisi !!',
        ]);

        Solusi::where('id', $this->ids)->update([
        	'id_user' => Auth::user()->id,
        	'id_permasalahan' => $this->id_permasalahan,
            'deskripsi_solusi' => $this->deskripsi_solusi,
            'deskripsi_penerapan' => $this->deskripsi_penerapan,
            'harapan' => $this->harapan,
            'file_solusi' => $this->file_solusi,
            'file_penerapan' => $this->file_penerapan,
            'feedback' => $this->feedback,
            'kategori' => $this->kategori,
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
		Solusi::where('id',$id)->delete();
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
        return view('livewire.sumbangide', [
        	'solusis' => Solusi::where('id_user', Auth::user()->id)->where('kategori', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
            'masalahs' => Masalah::get(),
            'kategoris' => Kategoricollabs::get(),
            'pesank' => Pesan::get(),
        ])->layout('sumbangideku.v_sumbangide');
    }
}
