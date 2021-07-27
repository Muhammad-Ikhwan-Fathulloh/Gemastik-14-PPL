<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\User;
use App\Models\Masalah;
use App\Models\Komentarmasalah;
use App\Models\Kategoricollabs;
use Livewire\WithPagination;

class Permasalahan extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

	public $latar_belakang;
	public $deskripsi_masalah;
	public $kategori;
    public $id_permasalahan;
    public $komentarpermasalahan;

	public $ids;

	public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearforms(){
        $this->id_permasalahan = '';
        $this->komentarpermasalahan = '';
    }

    public function SimpanDatas($idmasalah){
        Komentarmasalah::create([
            'id_user' => Auth::user()->id,
            'id_permasalahan' => $idmasalah,
            'komentar' => $this->komentarpermasalahan,
        ]);
        
        $this->clearforms();
        $this->alert('success', 'Komentar Terkirim!', [
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

	public function clearform(){
        $this->latar_belakang = '';
        $this->deskripsi_masalah = '';
        $this->kategori = '';
    }

    public function SimpanData(){
    	$this->validate([
            'latar_belakang' => 'required',
            'deskripsi_masalah' => 'required',
            'kategori' => 'required',
        ], [
            'latar_belakang.required' => 'Wajib diisi !!',
            'deskripsi_masalah.required' => 'Wajib diisi !!',
            'kategori.required' => 'Wajib dipilih !!',
        ]);

        Masalah::create([
        	'id_user' => Auth::user()->id,
            'latar_belakang' => $this->latar_belakang,
            'deskripsi_masalah' => $this->deskripsi_masalah,
            'kategori' => $this->kategori,
        ]);
        $this->alert('success', 'Berhasil dikirim!', [
                  'position' =>  'center', 
                  'timer' =>  3000,  
                  'toast' =>  false, 
                  'text' =>  '', 
                  'confirmButtonText' =>  'Ok', 
                  'cancelButtonText' =>  'Cancel', 
                  'showCancelButton' =>  false, 
                  'showConfirmButton' =>  false, 
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

    public function detailData($id){
		$Masalahk = Masalah::where('id',$id)->first();
		$this->ids = $Masalahk->id;
		$this->latar_belakang = $Masalahk->latar_belakang;
		$this->deskripsi_masalah = $Masalahk->deskripsi_masalah;
		$this->kategori = $Masalahk->kategori;
	}

	public function UbahData(){
		$this->validate([
            'latar_belakang' => 'required',
            'deskripsi_masalah' => 'required',
            'kategori' => 'required',
        ], [
            'latar_belakang.required' => 'Wajib diisi !!',
            'deskripsi_masalah.required' => 'Wajib diisi !!',
            'kategori.required' => 'Wajib diisi !!',
        ]);

        Masalah::where('id', $this->ids)->update([
        	'id_user' => Auth::user()->id,
            'latar_belakang' => $this->latar_belakang,
            'deskripsi_masalah' => $this->deskripsi_masalah,
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
		Masalah::where('id',$id)->delete();
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

    public function deleteDatas($id){
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
        if (empty(Auth::user()->id)) {
             return view('livewire.permasalahan', [
            'userk' => 0,
            'masalah' => Masalah::where('kategori', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(6),
            'masalahk' => Masalah::Join('users', 'masalahs.id_user', '=', 'users.id')->get(),
            'kategoris' => Kategoricollabs::get(),
            'komentars' => Komentarmasalah::Join('users', 'komentarmasalahs.id_user', '=', 'users.id')->orderBy('komentarmasalahs.id','DESC')->get(),
        ])->layout('masalah.v_permasalahan');
        }else{
             return view('livewire.permasalahan', [
            'userk' => Auth::user()->id,
            'masalah' => Masalah::where('kategori', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(6),
            'masalahk' => Masalah::Join('users', 'masalahs.id_user', '=', 'users.id')->get(),
            'kategoris' => Kategoricollabs::get(),
            'komentars' => Komentarmasalah::Join('users', 'komentarmasalahs.id_user', '=', 'users.id')->orderBy('komentarmasalahs.id','DESC')->get(),
        ])->layout('masalah.v_permasalahan');
        }
       
    }
}
