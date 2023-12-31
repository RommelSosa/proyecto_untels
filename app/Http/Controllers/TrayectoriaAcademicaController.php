<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use App\Models\Academico;
use App\Models\Doctorado;
use App\Models\Maestria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrayectoriaAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $maestrias= Maestria::where('matricula', Auth::user()->egresado_matricula)->count(); //cuentas las cantidad de matricula con el id de la matricula
        $doctorados = Doctorado::where('matricula', Auth::user()->egresado_matricula)->count(); //cuentas las cantidad de matricula con el id de la matricula
        $egresados0= DB::table('egresado')
        ->join('academico', 'egresado.id_academico', '=', 'academico.id_academico')
        ->select('academico.carr_profesional','egresado.grado_academico','egresado.año_ingreso', 'egresado.semestre_ingreso','egresado.año_egreso', 'egresado.semestre_egreso')
        ->where('matricula', Auth::user()->egresado_matricula)
        ->get();

        $egresados1 = DB::table('egresado')
            ->join('doctorado', 'egresado.matricula', '=', 'doctorado.matricula')
            ->join('academico', 'egresado.id_academico', '=', 'academico.id_academico')
            ->select('egresado.matricula','egresado.cant_doctorados', 'academico.id_academico','academico.carr_profesional','doctorado.id_doctorado', 'doctorado.grado_academico as doctorado_grado_academico', 'doctorado.pais as doctorado_pais', 'doctorado.institución as doctorado_institución', 'doctorado.fecha_inicial as doctorado_fecha_inicial', 'doctorado.fecha_final as doctorado_fecha_final')
            ->where('egresado.matricula', Auth::user()->egresado_matricula)
            ->get();

        $egresados= DB::table('maestria')
            ->join('egresado', 'egresado.matricula', '=', 'maestria.matricula')
            ->join('academico', 'egresado.id_academico', '=', 'academico.id_academico')
            ->select('egresado.matricula', 'egresado.cant_maestrias', 'academico.id_academico', 'academico.carr_profesional', 'maestria.id_maestria', 'maestria.grado_academico as maestria_grado_academico', 'maestria.pais as maestria_pais', 'maestria.institución as maestria_institución', 'maestria.fecha_inicial as maestria_fecha_inicial', 'maestria.fecha_final as maestria_fecha_final')
            ->where('egresado.matricula', Auth::user()->egresado_matricula)
            ->get();

        $count = Maestria::where('matricula', 2016200241)->count();
        /* return $maestrias; */
        return view('users.trayectoriaacademica', compact('egresados0','egresados','egresados1','maestrias','doctorados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 0;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maestria = Maestria::where('matricula', Auth::user()->egresado_matricula)->count(); //cuentas las cantidad de matricula con el id de la matricula

        $doctorado = Doctorado::where('matricula', Auth::user()->egresado_matricula)->count(); //cuentas las cantidad de matricula con el id de la matricula

        $prueba = $request->input('grado_academico');

        if ($prueba == 'Maestro') {
            $egresados = new Maestria();
            $egresados->grado_academico = $request->input('grado_academico');
            $egresados->pais = $request->input('pais');
            $egresados->institución = $request->input('institución');
            $egresados->fecha_inicial = $request->input('fecha_inicial');
            $egresados->fecha_final = $request->input('fecha_final');
            $egresados->matricula = Auth::user()->egresado_matricula;
            $egresados->save();

            //para agregar la cantidad de maestrias es necesario usar el findOrFail junto con el Auth::user
            $egresados = Egresado::findOrFail(Auth::user()->egresado_matricula);
            $egresados->cant_maestrias = ++$maestria; //suma la cantidad de maestrias más 1
            $egresados->save();

            //return $egresados;
            return redirect()->route('trayectoria-academica.index');
        } else {
            if ($prueba == 'Doctor') {
                $egresados = new Doctorado();
                $egresados->grado_academico = $request->input('grado_academico');
                $egresados->pais = $request->input('pais');
                $egresados->institución = $request->input('institución');
                $egresados->fecha_inicial = $request->input('fecha_inicial');
                $egresados->fecha_final = $request->input('fecha_final');
                $egresados->matricula = Auth::user()->egresado_matricula;
                $egresados->save();

                //para agregar la cantidad de maestrias es necesario usar el findOrFail junto con el Auth::user

                $egresados = Egresado::findOrFail(Auth::user()->egresado_matricula);
                $egresados->cant_doctorados = ++$doctorado; //suma la cantidad de doc más 1
                $egresados->save();




                /* return $egresados; */
                return redirect()->route('trayectoria-academica.index');
            }
        }
        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_academico)
    {
        return 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_academico)
    {
        return 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 0;
    }
}
