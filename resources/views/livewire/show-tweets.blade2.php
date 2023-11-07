
<div class="container mt-4">
    <h1 class="display-4 py-4 font-weight-bold">Tweets</h1>

    <form wire:submit.prevent="create" class="bg-white shadow rounded p-4">
        <div class="form-group">
            <label for="content" class="text-gray-700 text-sm font-weight-bold">Tweet</label>
            <textarea name="content" name="content" rows="5" placeholder="O que está pensando?"
                      wire:model="content">
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Criar Tweet</button>
    </form>

    @foreach ($tweets as $tweet)
    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    @if ($tweet->user->photo)
                    <img src="{{ url("storage/{$tweet->user->photo}") }}" alt="{{ $tweet->user->name }}" class="rounded-circle img-fluid">
                    @else
                    <img src="{{ url('imgs/no-image.png') }}" alt="{{ $tweet->user->name }}" class="rounded-circle img-fluid">
                    @endif
                </div>
                <div class="7/8">
                    {{ $tweet->user->name }} - {{ $tweet->content }}
                    @if($tweet->likes->count())
                    <a href="#"  wire:click.prevent="unlike({{$tweet->id}})">Descurtir</a>
                    @else
                    <a href="#" wire:click.prevent="like({{$tweet->id}})">Curtir</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="mt-4">
        {{ $tweets->links() }}
    </div>
</div>
