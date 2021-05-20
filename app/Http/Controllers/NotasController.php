<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Imagen;
use App\Models\EtiquetaNota;
use App\Http\Requests\NotasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;


class NotasController extends Controller
{
    public function index()
    {
        $notas = Nota::get();
        return view('notas.index', compact('notas'));
    }
    public function create()
    {
        $categorias = Categoria::get();
        $etiquetas = Etiqueta::get();
        return view('notas.create', compact('categorias', 'etiquetas'));
    }
    public function store(Request $request)
    {
        $nota = new Nota($request->all());
        $nota->slug = Str::of($request->titulo)->slug('-');
        $nota->user_id = Auth::user()->id;
        //$fecha = \Carbon\Carbon::parse($nota->fecha);
        $nota->save();


        if ($request->file('imagen_destacada')) {
            /*Lugar donde guardaré la imagen*/
            $path = 'public/posts/'.$nota->id;
            /*Imagen a guardar*/
            $archivo = $request->file('imagen_destacada');
            /*Guarda el archivo con storeAs en el Path, con el nombre imagen_destacada y con la extensión */
            $ruta = $archivo->storeAs($path, 'imagen_destacada'.'.'.$archivo->clientExtension());
            $nota->imagen_destacada = $ruta;
            $nota->save();
        }

        foreach ($request->etiquetas as $etiqueta) {
            $creaEtiqueta = new EtiquetaNota;
            $creaEtiqueta->nota_id = $nota->id;
            $creaEtiqueta->etiqueta_id = $etiqueta;
            $creaEtiqueta->save();
        }

        return redirect()->route('notas.index')->with('message_success', 'Se ha registrado una nueva nota con éxito.');
    }
    public function show(Nota $nota)
    {
        dd($nota, 'pendiente');
        return view('notas.show');
    }
    public function edit(Nota $nota)
    {
        $categorias = Categoria::get();
        $etiquetas = Etiqueta::get();
        return view('notas.edit', compact('nota', 'categorias', 'etiquetas'));
    }
    public function update(Request $request, Nota $nota)
    {
        dd($nota, 'pendiente');
    }
    public function destroy(Nota $nota)
    {
        $etiquetas = EtiquetaNota::where('nota_id', $nota->id)->delete();
        $nota->delete();
        return redirect()->route('notas.index')->with('message_success', 'Se ha eliminado la nota con éxito.');
    }

    public function estatus(Nota $nota)
    {
        ($nota->estatus == 1) ? $nota->estatus = 0 : $nota->estatus = 1;
        $nota->save();
        return redirect()->back()->with('message_success', 'Has cambiado el estatus de la nota '.$nota->titulo.'.');
    }

    public function imagenes(Nota $nota)
    {
        return view('notas.imagenes', compact('nota'));
    }

    public function guardarImagenes(Request $request, $id)
    {
        /*
        $archivo = $request->file('imagen');
        $path = 'public/posts/'.$nota->id;
        $fileName = Str::random(10).'.'.$archivo->clientExtension();
        $ruta = $archivo->storeAs($path, $fileName);

        $imagen = new Imagen();
        $imagen->ruta = $ruta;
        $imagen->nota_id = $id;
        $imagen->save();
        */
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $fileName = time().'.'.$image->extension();
        $file->move(public_path('images'),$fileName);
        return response()->json(['success'=>$fileName]);
    }

    function fetch(){
        $images = \File::allFiles(public_path('images'));
        $output = '<div class="row">';
            foreach($images as $image){
                $output .= '
                    <div class="col-md-2" style="margin-bottom:16px;" align="center">
                        <img src="'.asset('images/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                        <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
                    </div>
                ';
            }
        $output .= '</div>';
        echo $output;
    }

    function delete(Request $request){
        if($request->get('name')){
            \File::delete(public_path('images/' . $request->get('name')));
        }
    }
}
