<?php

namespace App\Exports;

use App\Models\Profesion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrayectoriaProfesionalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $egresados = DB::table('egresado')
        ->join('profesion', 'egresado.matricula', '=', 'profesion.matricula')
        ->select('profesion.matricula','egresado.dni',DB::raw("CONCAT(egresado.ap_paterno,' ',egresado.ap_materno,' ',egresado.nombres) as ap_nomb"),'profesion.empresa', 'profesion.actividad_empresa', 'profesion.puesto', 'profesion.nivel_experiencia', 'profesion.area_puesto','profesion.subarea', 'profesion.pais', 'profesion.fecha_inicio', 'profesion.fecha_finalizacion','profesion.descripcion_responsabilidades', 'profesion.sueldo')
        ->where('egresado.id_academico',Auth::user()->id_academico)
        ->orderBy('egresado.ap_paterno', 'asc')
        ->orderBy('egresado.ap_materno', 'asc')
        ->orderBy('egresado.nombres', 'asc')
        ->orderBy('profesion.fecha_inicio', 'asc')
        ->get();
        return $egresados; //aqui envia todos los datos seleccionados
    }

    public function headings(): array
    {
        return [
            'Código',
            'DNI',
            'Apellidos y nombres',
            'Empresa',
            'Actividad de la empresa',
            'Puesto',
            'Nivel de experiencia',
            'Área de puesto',
            'Subarea',
            'País',
            'Fecha inicio',
            'Fecha finalización',
            'Descripción de responsabilidades',
            'Sueldo'
        ];
    }
}
