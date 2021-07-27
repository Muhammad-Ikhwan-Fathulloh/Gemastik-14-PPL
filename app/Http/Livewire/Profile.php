<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class Profile extends Component
{
	public $detailUser;
	public $name;
	public $username;
	public $foto;
	public $email;
	public $tempat_lahir;
	public $tanggal_lahir;
	public $alamat;
	public $nohp;
	//--------------------------------------
	public $names;
	public $usernames;
	public $fotos;
	public $emails;
	public $passwords;
	public $tempat_lahirs;
	public $tanggal_lahirs;
	public $alamats;
	public $nohps;

    public function render()
    {
    	$detailUser = User::where('id', Auth::user()->id)->first();
    	$this->name = $detailUser->name;
    	$this->username = $detailUser->username;
    	$this->foto = $detailUser->foto;
    	$this->email = $detailUser->email;
    	$this->tempat_lahir = $detailUser->tempat_lahir;
    	$this->tanggal_lahir = $detailUser->tanggal_lahir;
    	$this->alamat = $detailUser->alamat;
    	$this->nohp = $detailUser->nohp;

        return view('livewire.profile')->layout('profile.v_profile');
    }

    public function SimpanData(){
		User::where('id', Auth::user()->id)->update([
			'name' => $this->names,
			'username' => $this->usernames,
			'foto' => $this->fotos,
            'tempat_lahir' => $this->tempat_lahirs,
            'tanggal_lahir' => $this->tanggal_lahirs,
            'alamat' => $this->alamats,
            'nohp' => $this->nohps,
		]);


        $this->alert('success', 'Berhasil Ubah Profile!', [
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

    public function DetailData(){
    	$detailUser = User::where('id', Auth::user()->id)->first();
    	$this->names = $detailUser->name;
    	$this->usernames = $detailUser->username;
    	$this->fotos = $detailUser->foto;
    	$this->emails = $detailUser->email;
    	$this->tempat_lahirs = $detailUser->tempat_lahir;
    	$this->tanggal_lahirs = $detailUser->tanggal_lahir;
    	$this->alamats = $detailUser->alamat;
    	$this->nohps = $detailUser->nohp;
    }
}
