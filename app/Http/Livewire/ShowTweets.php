<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{

    use WithPagination;
    
    public $content;
    public $rules = [
        'content' => 'required|min:3|max:255',
    ];
    public $userDefalut = 1;

    public function render()
    {
        $tweets = Tweet::with('user')->paginate(2);

        return view('livewire.show-tweets', [
            'tweets' => $tweets,
        ]);
    }
    public function create()
    {
        $this->validate();

        Tweet::create([
            'content' => $this->content,
            'user_id' => $this->userDefalut
        ]);
    }
}
