<!-- resources/views/dudas/edit.blade.php -->
<h1>Editar Duda</h1>

<form action="{{ route('messages.update', $duda->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="negrita">Negrita:</label>
    <input type="text" id="negrita" name="negrita" value="{{ old('negrita', $message->negrita) }}" required>

    <label for="subrayado">subrayado:</label>
    <input type="text" id="subrayado" name="subrayado" value="{{ old('subrayado', $message->subrayado) }}" required>

    <button type="submit">Actualizar Texto</button>
</form>