
<div>
    <h1 class="display-4 py-4 font-weight-bold">ShowTweets</h1>
    <form method="post" wire:submit.prevent="create">

        <input type="text" name="content" id="content" wire:model="content">
        @error('content')
        {{ $message }}
        @enderror
        <button type="submit">Criar comentario</button>
    </form>

    <h1>{{ $content }}</h1>
    <hr>
    @if ($tweets->count() > 0)
        @foreach($tweets as $tweet)
            <div class="flex">
                <div class="1/8">
                    @if($tweet->user->photo)
                        <img
                            width="250px"
                            src="{{url("storage/{$tweet->user->photo}")}}" alt="{{ $tweet->user->name }}">
                    @else
                        <img
                            src="https://thumbs.dreamstime.com/b/perfil-de-usu%C3%A1rio
                  -do-vetor-avatar-padr%C3%A3o-179376714.jpg">
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
            <br>
        @endforeach
    @else
        <p>Nenhum tweet encontrado.</p>
    @endif

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>
</div>
