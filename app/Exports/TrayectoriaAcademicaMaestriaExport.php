<?php

namespace App\Exports;

use App\Models\Maestria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrayectoriaAcademicaMaestriaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //selecciona todos los campos de la tabla egresado
        $egresados = DB::table('egresado')
        ->join('maestria', 'egresado.matricula', '=', 'maestria.matricula')
        ->select('maestria.matricula','egresado.dni',DB::raw("CONCAT(egresado.ap_paterno,' ',egresado.ap_materno,' ',egresado.nombres) as ap_nomb"),'maestria.grado_academico', 'maestria.pais', 'maestria.institución', 'maestria.fecha_inicial', 'maestria.fecha_final')
        ->where('egresado.id_academico',Auth::user()->id_academico)
        ->orderBy('egresado.ap_paterno', 'asc')
        ->orderBy('egresado.ap_materno', 'asc')
        ->orderBy('egresado.nombres', 'asc')
        ->orderBy('maestria.fecha_inicial', 'asc')
        ->get();
        $egresados1 = DB::table('egresado')
        ->join('doctorado', 'egresado.matricula', '=', 'doctorado.matricula')
        ->select('doctorado.matricula','egresado.dni',DB::raw("CONCAT(egresado.ap_paterno,' ',egresado.ap_materno,' ',egresado.nombres) as ap_nomb"),'doctorado.grado_academico', 'doctorado.pais', 'doctorado.institución', 'doctorado.fecha_inicial', 'doctorado.fecha_final')
        ->where('egresado.id_academico',Auth::user()->id_academico)
        ->orderBy('egresado.ap_paterno', 'asc')
        ->orderBy('egresado.ap_materno', 'asc')
        ->orderBy('egresado.nombres', 'asc')
        ->orderBy('doctorado.fecha_inicial', 'asc')
        ->get();
        $merged = $egresados->merge($egresados1);

        return $merged; //aqui envia todos los datos seleccionados
    }
    public function headings(): array
    {
        return [
            'Código',
            'DNI',
            'Apellidos y nombres',
            'Grado académico',
            'País',
            'Institución',
            'Fecha inicial',
            'Fecha final',
        ];
    }
}
