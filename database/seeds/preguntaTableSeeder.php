<?php

use Illuminate\Database\Seeder;

class preguntaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('encuestas')->insert([
            [
                'nombre' => 'Desendente'
            ],
            [
                'nombre' => 'Ascendente'
            ],            
        ]);

        DB::table('areas')->insert([
            [
                'nombre' => 'Competencias técnicas'
            ],
            [
                'nombre' => 'Competencias profesionales'
            ],
            [
                'nombre' => 'Eficacia personal'
            ], 
            [
                'nombre' => 'Competencias personales'
            ],           
        ]);

        DB::table('preguntas')->insert([
            [
                'concepto' => 'Conocimiento del Trabajo:',
                'explicacion' => 'Nivel de conocimiento para desempeñar los diversos deberes relativos a su cargo',
                'area_id' => '1'
            ],
            [
                'concepto' => 'Destrezas:',
                'explicacion' => 'Es hábil para ejecutar las tareas básicas del cargo',
                'area_id' => '1'
            ],
            [
                'concepto' => 'Rendimiento:',
                'explicacion' => 'Lleva un constante ritmo de trabajo o rapidez con la que realiza su trabajo',
                'area_id' => '1'
            ],
            [
                'concepto' => 'Calidad:',
                'explicacion' => 'Se ajusta a los estándares de calidad establecidos por su labor, ejecuta sus tareas con alto nivel de efectividad',
                'area_id' => '1'
            ],
            [
                'concepto' => 'Disciplina:',
                'explicacion' => 'Cumple con el reglamento interno, normas y políticas de personal. Asistencia y puntualidad en el trabajo',
                'area_id' => '1'
            ],
            [
                'concepto' => 'Trato con el Cliente:',
                'explicacion' => 'Como se comporta con los usuarios o proveedores. Cortesía y cordialidad en su trabajo. Satisfacción de las necesidades de los clientes',
                'area_id' => '2'
            ],
            [
                'concepto' => 'Trabajo en Equipo:',
                'explicacion' => 'Participa activamente en la consecución de una meta común, incluso cuando la colaboración no implique la satisfacción del interés propio',
                'area_id' => '2'
            ],
            [
                'concepto' => 'Espíritu de Colaboración e Iniciativa',
                'explicacion' => 'Aceptar y realizar labores adicionales. Desempeña tareas difíciles o desagradables cuando es necesario. Realiza sus funciones o deberes sin la necesidad de que sea mandado. Ayuda a sus compañeros en sus labores',
                'area_id' => '2'
            ],
            [
                'concepto' => 'Resolución de Problemas:',
                'explicacion' => 'Identifica los puntos clave de una situación o problema, es capaz de sintetizar y tomar decisiones',
                'area_id' => '2'
            ],
            [
                'concepto' => 'Autocrítica',
                'explicacion' => 'Evalúa con frecuencia y objetividad su propio comportamiento, con el fin de cambiar, fortalecer sus puntos fuertes y superar sus puntos débiles',
                'area_id' => '3'
            ],
            [
                'concepto' => 'Ambición',
                'explicacion' => 'Busca ocupar posiciones más altas, muestra conductas orientadas al desarrollo de su carrera y el éxito',
                'area_id' => '3'
            ],
            [
                'concepto' => 'Creatividad',
                'explicacion' => 'Genera planteamientos y soluciones innovadoras a los problemas que se le presentan',
                'area_id' => '3'
            ],
            [
                'concepto' => 'Enérgico',
                'explicacion' => 'Es hábil para crear y mantener un nivel de actividad intensa. Capacidad para el trabajo duro. Tiene impulsos',
                'area_id' => '3'
            ],
            
        ]);

        DB::table('preguntas')->insert([                        
            //para ascendente
            [
                'concepto' => 'Conocimiento relaciondos con su profesión',
                'area_id' => '1',
                'encuesta_id' => '2'
            ],
            [
                'concepto' => 'Conocimientos relacionados con sus funciones',
                'area_id' => '1',
                'encuesta_id' => '2'
            ],
            [
                'concepto' => 'Liderazgo',
                'area_id' => '1',
                'encuesta_id' => '2'
            ],
            [
                'concepto' => 'Elaboración de documentos afines',
                'area_id' => '1',
                'encuesta_id' => '2'
            ],
            [
                'concepto' => 'Capacidad de escuchar',
                'area_id' => '4',
                'encuesta_id' => '2'
            ],
            [
                'concepto' => 'Capacidad de decidir',
                'area_id' => '4',
                'encuesta_id' => '2'
            ],
            [
                'concepto' => 'Autonomía',
                'area_id' => '4',
                'encuesta_id' => '2'
            ],
            [
                'concepto' => 'Iniciativa',
                'area_id' => '4',
                'encuesta_id' => '2'
            ],
            [
                'concepto' => 'Disponibilidad',
                'encuesta_id' => '2',
                'area_id' => '4',                
            ],
        ]);
    }
}
