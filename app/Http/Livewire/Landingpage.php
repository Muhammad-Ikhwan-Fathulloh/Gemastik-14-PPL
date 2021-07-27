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

class Landingpage extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_permasalahan;
    public $komentarsolusi;
    public $pesan;
    public $file;

	public $ids;

	public $search;

	public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearforms(){
        $this->id_permasalahan = '';
        $this->komentarsolusi = '';
    }

    public function clearformk(){
        $this->pesan = '';
        $this->file = '';
    }

    public function SimpanDatak($idpesan){
        Pesan::create([
            'id_pesan' => $idpesan,
            'id_user' => Auth::user()->id,
            'pesan' => $this->pesan,
            'file' => $this->file,
        ]);
        $this->clearformk();

        $this->alert('success', 'Pesan Terkirim!', [
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

    public function SimpanDatas($idsolusi){
        Komentarsolusi::create([
            'id_user' => Auth::user()->id,
            'id_solusi' => $idsolusi,
            'komentar' => $this->komentarsolusi,
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

    public function render()
    {
        return view('livewire.landingpage', [
        	'solusis' => Solusi::where('kategori', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(6),
          'solusisk' => Solusi::Join('users', 'solusis.id_user', '=', 'users.id')->get(),
            'masalahs' => Masalah::get(),
            'kategoris' => Kategoricollabs::get(),
            'komentars' => Komentarsolusi::Join('users', 'komentarsolusis.id_user', '=', 'users.id')->orderBy('komentarsolusis.id','DESC')->get(),
        ])->layout('landing');
    }
}
