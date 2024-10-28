<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,
initial-scale=1.0">
 <title>Mensajes</title>
 <link rel="stylesheet" href="{{ asset('css/app.css')
}}">
 </head>
 <body>
 <div class="container">

 @if(session('success'))
 <div class="alert alert-success">
 {{ session('success') }}
 </div>
 @endif

 <table>
    <thead>
        <tr>
            <th>Negrita</th>
            <th>Subrayado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
            <tr>
                <td>
                    <!-- Botón para editar la palabra -->
                    <a href="{{ route('messages.edit', $messages->negrita) }}">Editar</a>
                </td>
                
                <td>{{ $messages->negrita }}</td>
                <td>{{ $messages->subrayado }}</td>
                <td>
                    <form action="{{ route('messages.destroy', $messages->negrita) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar esta palabra en negrita?');">
                            Eliminar
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('messages.destroy', $messages->subrayado) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar esta palabra subrayada?');">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

 <a href="/" class="btn
btn-secondary">Registrar Nuevo Mensaje</a>

 @if($messages->isEmpty())
 <p>No hay mensajes en la base de datos</p>
 @else
 <ul>
 @foreach($messages as $message)
 <b>{{ $message->negrita }}</b>
 <u>{{ $message->subrayado }}</u>
 @endforeach
 </ul>
 @endif
 </div>
 </body>
 </html>