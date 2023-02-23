<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\MessageRequest;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Muestra todos los mensajes en orden descendente si el usuario es admin, si no, lo redirige a la página de inicio
    public function index()
    {
        if (auth()->user()->rol == 'admin') {
            $messages = Message::orderBy('created_at', 'desc')->get();
            return view('messages.index', compact('messages'));
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Se redirige a la vista de crear mensajes
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Se crea un nuevo mensaje y se guarda en la base de datos
    public function store(MessageRequest $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->subject = $request->subject;
        $message->text = $request->text;
        $message->save();
        return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Si el usuario es admin, se muestra el mensaje, si no, se redirige a la página de inicio
    public function show(Message $message)
    {
        if (auth()->user()->rol == 'admin') {
            return view('messages.show', compact('message'));
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Si el usuario es admin, se elimina el mensaje, si no, se redirige a la página de inicio
    public function destroy(Message $message)
    {
        if (auth()->user()->rol == 'admin') {
            $message->delete();
            return redirect()->route('messages.index');
        } else {
            return redirect()->route('inicio');
        }
    }

    // Si el usuario es admin, se cambia el estado de leído del mensaje, si no, se redirige a la página de inicio
    public function toggleReaded(Message $message)
    {
        if (auth()->user()->rol == 'admin') {
            $message->readed = !$message->readed;
            $message->save();
            return redirect()->route('messages.show', $message);
        } else {
            return redirect()->route('inicio');
        }
    }
}
