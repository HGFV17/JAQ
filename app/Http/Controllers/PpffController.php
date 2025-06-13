<?php

namespace App\Http\Controllers;

use App\Models\Ppff;
use Illuminate\Http\Request;

class PpffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ppffs = Ppff::all();
        return view ('admin.ppffs.index',compact('ppffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ppffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_ppff(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
        'nombres' => 'required',
        'apellidos' => 'required',
        'ci' => 'required',
        'fecha_nacimiento' => 'required',
        'telefono' => 'required',
        'parentesco' => 'required',
        'ocupacion' => 'required',
        'direccion' => 'required',
        ]);

        $ppff = new Ppff();
        $ppff->nombres = $request->nombres;
        $ppff->apellidos = $request->apellidos;
        $ppff->ci = $request->ci;
        $ppff->fecha_nacimiento = $request->fecha_nacimiento;
        $ppff->telefono = $request->telefono;
        $ppff->parentesco = $request->parentesco;
        $ppff->ocupacion = $request->ocupacion;
        $ppff->direccion = $request->direccion;
        $ppff->save();

        return redirect()->route('admin.ppffs.index')
        ->with('mensaje', 'Se registro al padre de familia correctamente')
        ->with('icono', 'success');

    }

     public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
        'nombres' => 'required',
        'apellidos' => 'required',
        'ci' => 'required|unique:ppffs',
        'fecha_nacimiento' => 'required',
        'telefono' => 'required',
        'parentesco' => 'required',
        'ocupacion' => 'required',
        'direccion' => 'required',
        ]);

        $ppff = new Ppff();
        $ppff->nombres = $request->nombres;
        $ppff->apellidos = $request->apellidos;
        $ppff->ci = $request->ci;
        $ppff->fecha_nacimiento = $request->fecha_nacimiento;
        $ppff->telefono = $request->telefono;
        $ppff->parentesco = $request->parentesco;
        $ppff->ocupacion = $request->ocupacion;
        $ppff->direccion = $request->direccion;
        $ppff->save();

        return redirect()->back()
        ->with('mensaje', 'Se registro al padre de familia correctamente')
        ->with('icono', 'success');

    } 
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ppff = Ppff::with('estudiantes')->find($id);
        return view('admin.ppffs.show',compact('ppff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ppff = Ppff::with('estudiantes')->find($id);
        return view('admin.ppffs.edit',compact('ppff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'nombres' => 'required',
        'apellidos' => 'required',
        'ci' => 'required|unique:ppffs,ci,'.$id,
        'fecha_nacimiento' => 'required',
        'telefono' => 'required',
        'parentesco' => 'required',
        'ocupacion' => 'required',
        'direccion' => 'required',
        ]);

        $ppff = Ppff::find($id);
        $ppff->nombres = $request->nombres;
        $ppff->apellidos = $request->apellidos;
        $ppff->ci = $request->ci;
        $ppff->fecha_nacimiento = $request->fecha_nacimiento;
        $ppff->telefono = $request->telefono;
        $ppff->parentesco = $request->parentesco;
        $ppff->ocupacion = $request->ocupacion;
        $ppff->direccion = $request->direccion;
        $ppff->save();

        return redirect()->route('admin.ppffs.index')
        ->with('mensaje', 'Se actualizó los datos del padre de familia correctamente')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ppff = Ppff::find($id);
        $ppff->delete();

        return redirect()->route('admin.ppffs.index')
        ->with('mensaje', 'El padre de familia se ha eliminado correctamente.')
        ->with('icono','success');
    }
}
