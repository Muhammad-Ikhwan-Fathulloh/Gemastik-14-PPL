<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kategoricollabs;
use App\Models\Inspirasi;
use App\Models\User;
use App\Models\Komentarmasalah;
use App\Models\Komentarsolusi;
use App\Models\Masalah;
use App\Models\Solusi;
use App\Models\Pesan;
use Auth;

class Home extends Component
{
    public function render()
    {
    	if (Auth::user()->level==3) {
    		return view('livewire.home', [
	            'users' => 0,
	            'masalahs' => Masalah::where('id_user', Auth::user()->id)->count(),
	            'komenmasalahs' => Komentarmasalah::where('id_user', Auth::user()->id)->count(),
	            'solusis' => Solusi::where('id_user', Auth::user()->id)->count(),
	            'komensolusis' => Komentarsolusi::where('id_user', Auth::user()->id)->count(),
	            'inspirasis' => 0,
	        ])->layout('home');
    	}elseif(Auth::user()->level==2){
    		return view('livewire.home', [
	            'users' => 0,
	            'masalahs' => Masalah::where('id_user', Auth::user()->id)->count(),
	            'komenmasalahs' => Komentarmasalah::where('id_user', Auth::user()->id)->count(),
	            'solusis' => Solusi::where('id_user', Auth::user()->id)->count(),
	            'komensolusis' => Komentarsolusi::where('id_user', Auth::user()->id)->count(),
	            'inspirasis' => 0,
	        ])->layout('home');
    	}else{
    		return view('livewire.home', [
	            'users' => User::count(),
	            'masalahs' => Masalah::count(),
	            'solusis' => Solusi::count(),
	            'inspirasis' => Inspirasi::count(),
	        ])->layout('home');
    	} 
    }
}
