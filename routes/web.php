<?php

use App\Models\Message;
 use Illuminate\Http\Request;

 Route::get('/messages', function () {
 $messages = Message::all();
 return view('messages', ['messages' => $messages]);
 });

 Route::get('/', function () {
 return view('create_message');
 });

 Route::post('/messages', function (Request $request) {
 $validated = $request->validate([
 'text' => 'required|string|max:255',
 ]);

 Message::create($validated);

 return redirect('/messages')->with('success',
'Mensaje agregado exitosamente.');
 });

 
Route::get('/messages/{id}/edit', [formaController::class, 'edit'])->name('messages.edit');
Route::put('/messages/{id}', [formaController::class, 'update'])->name('messages.update');


Route::delete('/messages/{id}', [formaController::class, 'destroy'])->name('messages.destroy');

Route::get('/', [formaController::class, 'create'])->name('messages.create');
Route::post('/messages/store', [formaController::class, 'store'])->name('messages.store');
Route::get('/messages', [formaController::class, 'index'])->name('messages.index');