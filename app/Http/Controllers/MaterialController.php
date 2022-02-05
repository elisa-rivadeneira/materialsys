<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Material::all();
        return view("material.index",compact("items"));
    }
    public function xcomprar()
    {
        $items=Material::where('ubicacion','like',"COMPRAR")->paginate(10);
        return view("material.index",compact("items"));
    }

    public function xubicar()
    {
        $items=Material::where('ubicacion','like',"X UBICAR")->paginate(10);
        return view("material.index",compact("items"));
    }

    public function encampo()
    {
        $items=Material::where('ubicacion','like',"EN CAMPO")->paginate(10);
        return view("material.index",compact("items"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = Material::all();

        return view("material.create", compact("materials"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array(
            'relationship'=>'required',
            'description' => 'required',
            'oty_fm' => 'required',
            'e_bom' => 'required',
            'fmr' => 'required',
            'pt' => 'required',
            'ubicacion' => 'required',
            'destino' => 'required'

        ));
        $input = $request->all();

        DB::beginTransaction();
            $material = Material::create(array(
            "relationship" => $input["relationship"],
            "description" => $input["description"],
            "oty_fm" => $input["oty_fm"],
            "e_bom" => $input["e_bom"],
            "fmr" => $input["fmr"],
            "pt" => $input["pt"],
            "ubicacion" => $input["ubicacion"],
            "destino" => $input["destino"],
        ));

        DB::commit();


        return redirect("/materials")->with('grabado','ok');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material=Material::find($id);

        return view('material.edit',  compact("material"));

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

        $request->validate(array(
            'relationship'=>'required',
            'description' => 'required',
            'oty_fm' => 'required',
            'e_bom' => 'required',
            'fmr' => 'required',
            'pt' => 'required',
            'ubicacion' => 'required',
            'destino' => 'required',
        ));


        $material= Material::find($id);

        $material->relationship = $request->get('relationship');
        $material->description = $request->get('description');
        $material->oty_fm = $request->get('oty_fm');
        $material->e_bom = $request->get('e_bom');
        $material->fmr = $request->get('fmr');
        $material->pt = $request->get('pt');
        $material->ubicacion = $request->get('ubicacion');
        $material->destino = $request->get('destino');


        $material->save();




        return redirect("/materials");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material= Material::find($id);
        $material->delete();
        return redirect("/materials")->with("eliminar","ok");
    }
}
