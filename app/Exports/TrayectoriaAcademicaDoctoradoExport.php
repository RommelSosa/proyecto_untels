<?php

namespace App\Exports;

use App\Models\Doctorado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrayectoriaAcademicaDoctoradoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //selecciona todos los campos de la tabla egresado
        $egresados = DB::table('egresado')
        ->join('doctorado', 'egresado.matricula', '=', 'doctorado.matricula')
        ->select('doctorado.matricula','egresado.dni','doctorado.grado_academico', 'doctorado.pais', 'doctorado.institución', 'doctorado.fecha_inicial', 'doctorado.fecha_final')
        ->where('egresado.id_academico',Auth::user()->id_academico)
        ->get();
        return $egresados; //aqui envia todos los datos seleccionados
    }
    public function headings(): array
    {
        return [
            'Código',
            'DNI',
            'Grado académico',
            'País',
            'Institución',
            'Fecha inicial',
            'Fecha final',
        ];
    }
}
