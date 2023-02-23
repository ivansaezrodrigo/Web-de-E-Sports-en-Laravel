<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EditEventRequest;




class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // Muestra todos los eventos visibles y los eventos no visibles si el usuario es admin
    public function index()
    {
        if (Auth::check() && auth()->user()->rol == 'admin')
        {
            $events = Event::all();
            return view('events.index', compact('events'));
        } else {
            $events = Event::where('visible', 1)->get();
            return view('events.index', compact('events'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Si el usuario no es admin, no puede crear eventos, si lo es, se le redirige a la vista de crear eventos
    public function create()
    {
        if (Auth::user()->rol != 'admin')
        {
            return redirect()->route('inicio');
        }
            
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // se crea un nuevo evento y se guarda en la base de datos
    public function store(EventRequest $request)
    {
        $event = new Event();
        $event->name = $request->get('name');
        $event->description = $request->get('description');
        $event->tags = $request->get('tags');
        $event->location = $request->get('location');
        $event->fecha = $request->get('fecha');
        $event->hour = $request->get('hour');
        $event->visible = $request->has('visible') ? 1 : 0;
        $event->save();

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Si el evento no es visible y el usuario no es admin, no se le permite ver el evento, si lo es, se le redirige a la vista del evento
    public function show(Event $event)
    {
        if($event->visible == 0 && Auth::user()->rol != 'admin')
        {
            return redirect()->route('inicio');
        }
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Si el usuario no es admin, no puede editar eventos, si lo es, se le redirige a la vista de editar eventos
    public function edit(Event $event)
    {
        if (Auth::user()->rol != 'admin')
        {
            return redirect()->route('inicio');
        }
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Se edita el evento y se guarda en la base de datos
    public function update(EditEventRequest $request, Event $event)
    {
        $event->name = $request->name;
        $event->description = $request->description;
        $event->tags = $request->tags;
        $event->location = $request->location;
        $event->fecha = $request->fecha;
        $event->hour = $request->hour;
        $event->visible = 1;
        
        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Se elimina el evento de la base de datos si el usuario es admin
    public function destroy(Event $event)
    {
        if (Auth::user()->rol != 'admin')
        {
            return redirect()->route('inicio');
        }
        $event->delete();
        return redirect()->route('events.index');
    }

    // Se cambia el estado de visible del evento
    public function toggleAssistance(Event $event)
    {
        // Si el evento es visible y el usuario está logueado, se le permite asistir al evento
        if ($event->visible == 1 && auth()->check()) {
            $user = Auth::user();
            
            // Si el usuario ya está apuntado al evento, se le permite desapuntarse, si no, se le permite apuntarse
            if($user->events->contains($event))
            {
                $user->events()->detach($event);
            }
            else
            {
                $user->events()->attach($event);
            }
        } else {
            // Si el evento no es visible o el usuario no está logueado, se le redirige a la página de inicio
            return redirect()->route('inicio');
        }
        // Se le redirige a la página del evento
        return redirect()->route('events.show', $event);

    }
}
