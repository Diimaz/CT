<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $model  = model('prueba');

        /*$data = [
            'idCt' => 1,
            'encargado' => 'User',
            'dispositivo' => '{"dispositivos": {"id1":"1","id2":"2"}}'
        ];*/

        //$model->save($data);

        $datos = $model->findColumn('dispositivo');
        $mostrar = json_encode($datos);
        //echo $mostrar;

        //dd($model->findColumn('dispositivo'));
        return view ('auth/login');
    }
}