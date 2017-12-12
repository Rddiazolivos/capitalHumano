<?php

use Illuminate\Database\Seeder;

class proyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('proyectos')->insert([
            'nombre' => 'Campaña Donaciones',
            'fec_creacion' => '2017/01/01',
            'fec_termino' => '2018/01/01',
            'observaciones' => 'Campaña de las donaciones de organos',
            'encuAscendente_id' => '2',
            'encuDescendente_id' => '1',
            'estado_id' => '1',
            'user_id' => '4',
        ]);
        DB::table('etapas')->insert([
            [
                'nombre' => 'Análisis',
                'fec_creacion' => '2017/01/01',
                'fec_termino' => '2018/01/01',
                'observaciones' => 'Tiene como finalidad el establecer proyecciones de los hechos más significativos',
                'estado_id' => '1',
                'proyecto_id' => '1',
            ],
            [
                'nombre' => 'Elaboración de estrategias',
                'fec_creacion' => '2017/01/01',
                'fec_termino' => '2018/01/01',
                'observaciones' => 'Las estrategias son los caminos de acción de que dispone la empresa para alcanzar los objetivos previstos',
                'estado_id' => '1',
                'proyecto_id' => '1',
            ],
            [
                'nombre' => 'Plan de acción',
                'fec_creacion' => '2017/01/01',
                'fec_termino' => '2018/01/01',
                'observaciones' => 'Tendrá que elaborarse un plan de acción para conseguir los objetivos propuestos en el plazo determinado',
                'estado_id' => '1',
                'proyecto_id' => '1',
            ],
        ]);
        DB::table('actividades')->insert([
            [
                'nombre' => 'Documentar los objetivos',
                'descripcion' => 'Generar la documentación de la campaña. Utilizar plantilla A1',
                'fec_entrega' => '2017/01/01',
                'asignacion' => '1',
                'prioridad_id' => '1',              
                'estado_id' => '2',
                'etapa_id' => '1',
            ],
            [
                'nombre' => 'Definición del público objetivo',
                'descripcion' => 'La definición del público objetivo (target) al que se desee llegar.',
                'fec_entrega' => '2017/01/01',
                'asignacion' => '1',
                'prioridad_id' => '1',              
                'estado_id' => '2',
                'etapa_id' => '2',
            ],
            [
                'nombre' => 'Planteamiento general y objetivos',
                'descripcion' => 'El planteamiento general y objetivos específicos de las diferentes variables del marketing (producto, comunicación, fuerza de ventas, distribución...).',
                'fec_entrega' => '2017/01/01',
                'asignacion' => '1',
                'prioridad_id' => '1',              
                'estado_id' => '1',
                'etapa_id' => '2',
            ],
            [
                'nombre' => 'Valoración global del plan',
                'descripcion' => 'La valoración global del plan, elaborando la cuenta de explotación provisional, la cual nos permitirá conocer si obtenemos la rentabilidad fijada.',
                'fec_entrega' => '2017/01/01',
                'asignacion' => '0',
                'prioridad_id' => '1',              
                'estado_id' => '1',
                'etapa_id' => '2',
            ],
            [
                'nombre' => 'Definción del plan',
                'descripcion' => 'Generar el plan de acción',
                'fec_entrega' => '2017/01/01',
                'asignacion' => '0',
                'prioridad_id' => '1',              
                'estado_id' => '1',
                'etapa_id' => '3',
            ],
        ]);
        DB::table('responsables')->insert([
            [
                'responsable_id' => '6',
                'actividad_id' => '1',
            ],
            [
                'responsable_id' => '6',
                'actividad_id' => '2',
            ],
            [
                'responsable_id' => '7',
                'actividad_id' => '3',
            ],
        ]);
    }
}
