<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class Auth implements FilterInterface
{
    protected $configs;

    
    public function before(RequestInterface $request, $arguments = null)
    {
        $configs = config('CT');

        if(session()->is_logged){
            $model = model('UsuarioModel');

            if(!$usuario=$model->buscarUsuario('idUsuario',session()->idUsuario)){
                session()->destroy();
                return redirect()->route('login')->with('msg',[
                    'type' => 'danger',
                    'body' => 'Usuario no disponible'
                ]);
            }
            $model->buscarRol($usuario->idRol);

            if($model->asignarVistaRol == $configs->defaultRolUsuario){
                return redirect()->route('user');
            }
            if($model->asignarVistaRol == $configs->defaultRolAdmin){
                return redirect()->route('incidencia');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}