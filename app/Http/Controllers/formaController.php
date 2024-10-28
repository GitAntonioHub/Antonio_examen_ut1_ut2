<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\messages;
use Illuminate\Support\Facades\Storage;

class messagesController extends Controller{
    public function update(Request $request, $id)
{
    // Validar los datos recibidos del formulario
    $request->validate([
        'negrita' => 'required',
        'subrayado' => 'required',
    ]);

    // Buscar la messages por su ID y actualizar sus datos
    $messages = messages::findOrFail($id);
    $messages->update([
        'subrayado' => $request->input('subrayado'),
        'negrita' => $request->input('negrita'),
    ]);

    // Redirigir al listado con un mensaje de éxito
    return redirect()->route('messages.index')->with('success', 'messages actualizada correctamente.');
}



    public function edit($id)
{
    // Buscar la messages por su ID
    $messages = messages::findOrFail($id);

    // Pasar la messages a la vista de edición
    return view('messages.edit', compact('messages'));
}


    public function destroy($id)
{
    // Buscar la messages por su ID
    $messages = messages::findOrFail($id);

    // Eliminar la messages
    $messages->delete();

    // Redirigir de nuevo al listado de messages con un mensaje de éxito
    return redirect()->route('messages.index')->with('success', 'messages eliminada correctamente.');
}


    public function create(){

    $message = [
        
    ];

    return view('welcome', compact('message'));
}



    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }


    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'subrayado' => 'required|string',
            'negrita' => 'required|string',
        ]);

        // Crear la instancia de messages
        $messages = Message::create($request->all());

        // Datos a escribir en el CSV
        $csvData = [
            '"' . $messages->negrita . '"',
            '"' . $messages->subrayado . '"',
        ];
        
        // Ruta del archivo CSV
        $csvFile = storage_path('app/forma.csv');

        // Verificar si el archivo existe
        if (!file_exists($csvFile)) {
            // Si no existe, crea el archivo y agrega los encabezados
            file_put_contents($csvFile, "text\n");
        }

        // Escribir los datos en el archivo CSV
        file_put_contents($csvFile, implode(';', $csvData) . "\n", FILE_APPEND);

        // Redirigir a una página de éxito
        return redirect()->route('messages.create')->with('success', 'Los datos se han registrado correctamente.');
    
        DB::table('messages')->insert([
            'negrita' => $validatedData['negrita'],
            'subrayado' => $validatedData['subrayado'],
            'asunto' => $validatedData['asunto'],
        ]);
    
        return redirect()->back()->with('success', 'Mensaje enviada correctamente.');
    

    }

}