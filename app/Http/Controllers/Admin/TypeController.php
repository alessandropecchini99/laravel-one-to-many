<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate(5);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione
        $request->validate(
            [
                'name'          => 'required|string|max:20',
                'description'   => 'required|string|max:200',
            ]
        );

        // prendo i dati dalla create page
        $data = $request->all();

        // salvare i dati in db se validi
        $newType = new Type();
        $newType->name          = $data['name'];
        $newType->description   = $data['description'];
        $newType->save();

        // returnare in una rotta di tipo get
        return to_route('admin.types.show', ['type' => $newType]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        // validazione
        $request->validate(
            [
                'name'          => 'required|string|max:20',
                'description'   => 'required|string|max:200',
            ]
        );

        $data = $request->all();

        // aggiornare i dati nel db se validi
        $type->name         = $data['name'];
        $type->description  = $data['description'];
        $type->update();

        // ridirezionare su una rotta di tipo get
        return to_route('admin.types.show', ['type' => $type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index')->with('delete_success', $type);
    }
}
