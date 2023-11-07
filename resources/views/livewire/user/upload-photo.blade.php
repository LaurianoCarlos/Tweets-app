<div>
    <h1>Atualizar foto de perfil</h1>
   <form action="#" method="POST" wire:submit.prevent="storagePhoto">
        <input type="file" wire:model="photo">
       <br>
       @error('photo')
       {{$message}}
       @enderror
       <button type="submit">Enviar foto</button>
   </form>
</div>
