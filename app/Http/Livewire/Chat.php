<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\User;
use App\Models\Solusi;
use App\Models\Pesan;
use Livewire\WithPagination;

class Chat extends Component
{
	use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_pesan;
	public $pesan;
	public $file;

	public $ids;

	public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->pesan = '';
        $this->file = '';
    }

    public function SimpanData(){
      if (is_null($this->id_pesan)) {
        $this->alert('error', 'Pilih Pesan!', [
                  'position' =>  'center', 
                  'timer' =>  3000,  
                  'toast' =>  false, 
                  'text' =>  '', 
                  'confirmButtonText' =>  'Ok', 
                  'cancelButtonText' =>  'Cancel', 
                  'showCancelButton' =>  false, 
                  'showConfirmButton' =>  false, 
            ]);
      }elseif ($this->id_pesan == '------- Pesan -------') {
        $this->alert('error', 'Pilih Pesan!', [
                  'position' =>  'center', 
                  'timer' =>  3000,  
                  'toast' =>  false, 
                  'text' =>  '', 
                  'confirmButtonText' =>  'Ok', 
                  'cancelButtonText' =>  'Cancel', 
                  'showCancelButton' =>  false, 
                  'showConfirmButton' =>  false, 
            ]);
      } else{
        Pesan::create([
            'id_pesan' => $this->id_pesan,
          'id_user' => Auth::user()->id,
            'pesan' => $this->pesan,
            'file' => $this->file,
        ]);
    $this->clearform();

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
        
    }

    public function deleteData($id){
		Pesan::where('id',$id)->delete();
		session()->flash('pesan','Data Berhasil Dihapus !!!');
	}

    public function render()
    {
        return view('livewire.chat', [
        	'pesand' => Pesan::where('pesan', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
            'pesank' => Pesan::Join('users', 'pesans.id_user', '=', 'users.id')->orderBy('pesans.id','DESC')->get(),
            'userb' => Solusi::get(),
            'userk' => User::get(),
            'idpesan' => $this->id_pesan,
        ])->layout('chatting.v_chat');
    }
}
