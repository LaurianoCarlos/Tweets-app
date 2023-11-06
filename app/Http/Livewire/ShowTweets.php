<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
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
        $tweets = Tweet::with('user')->paginate(10);

        return view('livewire.show-tweets', [
            'tweets' => $tweets,
        ]);
    }
    public function create()
    {
        $this->validate();

        auth()->user()->tweets()->create(
            [
                'content' => $this->content,
            ]
        );
    }
    public function like($idTweet)
    {
        $tweet = Tweet::find($idTweet);

        $like = new Like([
            'user_id' => auth()->user()->id,
        ]);

        $tweet->likes()->save($like);
    }
    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }

}
