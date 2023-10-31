<div>
    <p>ShowTweets</p>

    <form method="post" wire:submit.prevent="create">

        <input type="text" name="message" id="message" wire:model="message">
        <button type="submit">Criar comentario</button>

    </form>

    <h1>{{ $message }}</h1>

    <hr>
    @if ($tweets->count() > 0)
        @foreach($tweets as $tweet)
            {{ $tweet->user->name }} - {{ $tweet->content }} <br>
        @endforeach
    @else
        <p>Nenhum tweet encontrado.</p>
    @endif
</div>
