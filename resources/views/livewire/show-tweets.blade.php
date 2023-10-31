<div>
    <p>ShowTweets</p>

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
            {{ $tweet->user->name }} - {{ $tweet->content }} <br>
        @endforeach
    @else
        <p>Nenhum tweet encontrado.</p>
    @endif
</div>
