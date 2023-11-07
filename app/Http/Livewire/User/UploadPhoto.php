<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
    use WithFileUploads;

    protected $rules = [
        'photo' => 'required|image|max:1024'
    ];

    public $photo;
    public function render()
    {
        return view('livewire.user.upload-photo');
    }
    public function storagePhoto()
    {
        $this->validate();

        $user = auth()->user();

        //pega o nome do usuario logado no formato  "name-name"
        $nameFile = Str::slug($user->name)
            . "."
            . $this->photo->getClientOriginalExtension();//o tipo de arquiso Ex:jpg

       if($path =  $this->photo->storeAs('users', $nameFile)){
           $user->update([
                'profile_photo_path' => $path,
           ]);
       }
        return redirect()->route('tweets.index');


    }
}
