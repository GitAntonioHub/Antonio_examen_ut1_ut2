<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,
initial-scale=1.0">
 <title>Registrar Nuevo Mensaje</title>
 <link rel="stylesheet" href="{{ asset('css/app.css')
}}">
 </head>
 <body>
 <div class="container">
 <h1>Registrar Nuevo Mensaje</h1>

 @if($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
 @endif
 <form action="/messages" method="POST">
 @csrf
 <div class="form-group">
 <label for="text">Mensaje:</label>
 <textarea name="text" id="text" rows="4"
class="form-control" required></textarea>
 </div>
 <button type="submit" class="btn
btn-primary">Guardar Mensaje</button>
 </form>

 <a href="/messages">Volver a la lista de
mensajes</a>
 </div>
 </body>
 </html>