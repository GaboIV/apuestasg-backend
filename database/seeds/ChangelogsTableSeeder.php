<?php

use Illuminate\Database\Seeder;

class ChangelogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('changelogs')->delete();
        
        \DB::table('changelogs')->insert(array (
            0 => 
            array (
                'id' => 11,
                'user_id' => 1,
            'text' => 'Página individual para carreras (Clientes)',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-19 16:02:25',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 12,
                'user_id' => 1,
            'text' => 'Página individual para partidos (Clientes)',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-19 16:02:31',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 15,
                'user_id' => 1,
                'text' => 'Creación de módulo para agregar y modificar Términos y Condiciones, Reglas, Normas y datos referentes a la página. ',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-19 16:06:36',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 16,
                'user_id' => 1,
            'text' => 'Creación de un módulo de mensajes para los clientes y administradores (Chat por mensajes)',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-19 16:07:08',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 17,
                'user_id' => 1,
                'text' => 'Mejorar la forma en que se muestran los datos al registrar partidos desde módulo Actualizaciones',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-20 14:13:57',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 19,
                'user_id' => 1,
                'text' => 'Creación de videotutoriales de como se registran partidos desde módulo de Actualizaciones',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-20 14:15:35',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 20,
                'user_id' => 1,
                'text' => 'Habilitar funciones en la carga de partidos del módulo de Actualizaciones para cargar partidos de Dobles de Tenis.',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-20 14:45:03',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 22,
                'user_id' => 1,
                'text' => 'Mostrar nacionalidades de Ligas correctamente en módulo de Ligas',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-20 16:04:25',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 24,
                'user_id' => 1,
                'text' => 'Caja de búsqueda en Actualizaciones de Liga',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-22 11:17:49',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 25,
                'user_id' => 1,
                'text' => 'Crear versiones para Betzone, y mostrar en la pantalla principal
',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-22 12:48:12',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 31,
                'user_id' => 1,
                'text' => 'Crear la opción para el RETIRADO en el hipismo. No que no pueda ser elegible por el cliente. En caso que ya haya sido seleccionado anular la jugada automáticamente.',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-26 05:20:46',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 33,
                'user_id' => 1,
                'text' => 'Corregir multiplicación de las cuotas de béisbol venezolano',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-27 11:00:08',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 63,
                'user_id' => 2,
            'text' => 'Agregar nuevo dato para changelog (impact) que aumentará la versión de la página web automáticamente en niveles (Bajo = 0.01, Medio = 0.10 y Alto (muy raro) = 1.00).',
                'status' => 0,
                'category' => 0,
                'created_at' => '2020-09-19 14:21:55',
                'updated_at' => '2020-09-19 14:21:55',
            ),
            13 => 
            array (
                'id' => 62,
                'user_id' => 2,
                'text' => 'Crear módulos de cancelados y verificados',
                'status' => 0,
                'category' => 0,
                'created_at' => '2020-09-19 14:20:10',
                'updated_at' => '2020-09-19 14:20:10',
            ),
            14 => 
            array (
                'id' => 60,
                'user_id' => 2,
                'text' => 'Buscador de changelogs',
                'status' => 0,
                'category' => 0,
                'created_at' => '2020-09-19 14:19:39',
                'updated_at' => '2020-09-19 14:19:39',
            ),
            15 => 
            array (
                'id' => 61,
                'user_id' => 2,
                'text' => 'Crear modales para agregar y editar los changelogs',
                'status' => 0,
                'category' => 0,
                'created_at' => '2020-09-19 14:19:58',
                'updated_at' => '2020-09-19 14:19:58',
            ),
            16 => 
            array (
                'id' => 39,
                'user_id' => 1,
                'text' => 'Mejorar la precisión de cálculo de premios.',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-11-28 14:49:45',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 65,
                'user_id' => 2,
                'text' => 'Mejorar menú lateral izquierdo para mostrar los deportes, países y lugas activas.',
                'status' => 0,
                'category' => 0,
                'created_at' => '2020-09-19 14:23:07',
                'updated_at' => '2020-09-19 14:23:07',
            ),
            18 => 
            array (
                'id' => 64,
                'user_id' => 2,
                'text' => 'Mostrar versión de la página de forma dinámica, crear tabla en la base de datos para esto.',
                'status' => 0,
                'category' => 0,
                'created_at' => '2020-09-19 14:22:37',
                'updated_at' => '2020-09-19 14:22:37',
            ),
            19 => 
            array (
                'id' => 46,
                'user_id' => 1,
                'text' => 'Creación de estilos para botones. Para ser utilizado en todos lo módulos de la página.',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-12-03 22:02:44',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 47,
                'user_id' => 1,
                'text' => 'Crear balance de dinero del cliente.',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-12-03 22:02:59',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 48,
                'user_id' => 1,
                'text' => 'Posibilidad de anular partidos. Y mostrar un aviso a los usuarios en la pagina principal',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-12-03 22:08:14',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 51,
                'user_id' => 1,
                'text' => 'Mejorar aspecto y funciones del módulo de Resultados',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-12-05 21:02:20',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 59,
                'user_id' => 2,
            'text' => 'Agregar funciones para changelogs: editar (cambiar texto), cancelar (eliminar de la vista principal, pasar a nueva vista de cancelados que durarán 72 horas antes de desaparecer, se pueden restaurar durante esas próximas 72 horas) y verificar (Ya no son vi',
                'status' => 0,
                'category' => 0,
                'created_at' => '2020-09-19 14:19:20',
                'updated_at' => '2020-09-19 14:19:20',
            ),
            24 => 
            array (
                'id' => 53,
                'user_id' => 1,
                'text' => 'Sumar saldos a clientes sin refrescar página',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-12-07 16:19:28',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 54,
                'user_id' => 1,
                'text' => 'Colocar botón para imprimir las apuestas pendientes e historial de apuestas.',
                'status' => 0,
                'category' => 0,
                'created_at' => '2018-12-08 05:26:51',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 58,
                'user_id' => 2,
                'text' => 'Mejorar vista de changelogs',
                'status' => 0,
                'category' => 0,
                'created_at' => '2020-09-19 14:17:41',
                'updated_at' => '2020-09-19 14:17:41',
            ),
        ));
        
        
    }
}