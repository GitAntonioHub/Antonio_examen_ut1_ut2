<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Antonio</title>
    </head>
    <body>
        <form action="{{ route('messages.store') }}" method="POST">            @csrf
            <div class="form-group">
            <label for="text">Mensaje:</label>
            <textarea name="text" id="text" rows="4"
            class="form-control" required></textarea>
            </div>
            <div class="form-group">
            <label for="color">Forma del Mensaje:</label>
            <input type="text" name="forma" id="color"
            class="form-control" placeholder="negrita o subrayado">
            </div>
            <button type="submit" class="btn btn-primary">Guardar
            Mensaje</button>
            <button type="submit" class="btn btn-primary" id="negrita">Guardar Mensaje como negrita</button>
            <button type="submit" class="btn btn-primary" id="subrayado">Guardar Mensaje como subrayado</button>
            </form>
    </body>
</html>