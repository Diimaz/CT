<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Usuario;

class Admin extends BaseController{
    protected $configs;

    public function __construct(){
        $this->configs=config('CT');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function index(){
        return view ('admin/incidencias');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function register(){
        return view ('admin/registrarUsuario');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function report(){
        return view ('admin/reportes');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function buscarUsuario(){

        $estatus = trim($this->request->getVar('estado'));
        if($estatus == null) {
            $estatus = 1;
        }

        $model = model('UsuarioModel');
        return view ('admin/buscarUsuario',[
            'usuarios' =>$model->where('estado', $estatus)->findAll()
        ]);

    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function agregarDispositivo(){
        return view ('admin/agregarDispositivo');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function miPerfil(){
        $model=model('UsuarioModel');
        return view ('admin/perfil',[
            'usuario' => $model->find(session('idUsuario'))
        ]);
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function updatePerfil(){
        
        $valorRecibido = $_GET['id'];
        $model = model('UsuarioModel');
        $valorMostar = null;
        $usuarioComparar = null;
        $emailComparar = null;
        $telefonoComparar = null;
        $buscar = $model->findAll();
        
        foreach ($buscar as $key) {
            if(password_verify($key->idUsuario,$valorRecibido)){
                $valorMostar = $key->idUsuario;
                $usuarioComparar = $key->usuario;
                $emailComparar = $key->email;
                $telefonoComparar = $key->telefono;
                break;
            }
        }

        $validar = service('validation');
        
        $nombre = trim($this->request->getVar('nombre'));
        $apellido = trim($this->request->getVar('apellido'));
        $usuario = trim($this->request->getVar('usuario'));
        $email = trim($this->request->getVar('email'));
        $telefono = trim($this->request->getVar('telefono'));


        if($usuario != $usuarioComparar){
            $validar->setRules([
                'usuario'=>'is_unique[tbl_usuarios.usuario]'
            ],
            [
                'usuario' => [
                        'is_unique' => 'El usuario ya se encuentra disponible'
                ],
            ]
            );
            if(!$validar->withRequest($this->request)->run()){
                return redirect()->back()->withInput()->with('errors',$validar->getErrors());
            }
        }

        if($email != $emailComparar){
            $validar->setRules([
                'email'=>'is_unique[tbl_usuarios.email]'
            ],
            [
                'email' => [
                        'is_unique' => 'El correo ya se encuentra disponible'
                ],
            ]
            );
            if(!$validar->withRequest($this->request)->run()){
                return redirect()->back()->withInput()->with('errors',$validar->getErrors());
            }
        }

        if($telefono != $telefonoComparar){
            $validar->setRules([
                'telefono'=>'is_unique[tbl_usuarios.telefono]'
            ],
            [
                'telefono' => [
                        'is_unique' => 'El telefono ya se encuentra disponible'
                ],
            ]
            );
            if(!$validar->withRequest($this->request)->run()){
                return redirect()->back()->withInput()->with('errors',$validar->getErrors());
            }
        }


        $validar->setRules([
            'nombre'=>'required|alpha_space',
            'apellido'=>'required|alpha_space',
            'email'=>'required|valid_email',
            'telefono'=>'required|numeric',
            'password'=>'matches[c-password]'
        ],
        [
            'nombre' => [
                    'required' => 'Digite un nombre',
                    'alpha_space' => 'Caracteres no permitidos'
            ],
            'apellido' => [
                'required' => 'Digite un apellido',
                'alpha_space' => 'Caracteres no permitidos'
            ],
            'email' => [
                'required' => 'Digite un correo',
                'valid_email' => 'Correo no valido',
              
            ],
            'telefono' => [
                'required' => 'Digite un número de telefono',
                'numeric' => 'Solo digite numeros',
               
            ],
            'password' => [
                //'required' => 'Digite su contraseña',
                'matches' => 'Las contraseñas no coinciden'
            ],
        ]
        );

        if(!$validar->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validar->getErrors());
        }
        
        $dataActualizada= [
            'idUsuario' => $valorMostar,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'usuario' => $usuario,
            'email' => $email,
            'telefono' => $telefono,
        ];  

        $model->save($dataActualizada);

        return redirect()->route('updatePerfil');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function actualizarPerfil(){
        $model=model('UsuarioModel');
        return view ('admin/actualizarPerfil',[
            'usuario' => $model->find(session('idUsuario'))
        ]);
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function registerCt(){
        return view ('admin/registrarCt');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function registrarUsuario(){

        $validar = service('validation');
        
        $validar->setRules([
            'nombre'=>'required|alpha_space',
            'apellido'=>'required|alpha_space',
            'email'=>'required|valid_email|is_unique[tbl_usuarios.email]',
            'telefono'=>'required|numeric|is_unique[tbl_usuarios.telefono]',
            'dui'=>'required|numeric|is_unique[tbl_usuarios.dui]',
            'password'=>'required|matches[c-password]'
        ],
        [
            'nombre' => [
                    'required' => 'Digite un nombre',
                    'alpha_space' => 'Caracteres no permitidos'
            ],
            'apellido' => [
                'required' => 'Digite un apellido',
                'alpha_space' => 'Caracteres no permitidos'
            ],
            'email' => [
                'required' => 'Digite un correo',
                'valid_email' => 'Correo no valido',
                'is_unique' => 'Este correo ya existe'
            ],
            'telefono' => [
                'required' => 'Digite un número de telefono',
                'numeric' => 'Solo digite numeros',
                'is_unique' => 'Este número de telefono ya existe'
            ],
            'dui' => [
                'required' => 'Digite un número de Dui',
                'numeric' => 'Solo digite numeros',
                'is_unique' => 'Este número de dui ya existe'
            ],
            'password' => [
                'required' => 'Digite su contraseña',
                'matches' => 'Las contraseñas no coinciden'
            ],
        ]
        );

        if(!$validar->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validar->getErrors());
        }

        $usuario = new Usuario($this->request->getPost());

        $usuario->generarUsername();

        $model=model('UsuarioModel');

        $model->agregarUnRol($this->configs->defaultRolUsuario);

        $model->agregarUnEstado();

        $model->save($usuario);

        return redirect()->route('register')->with('msg',[
            'type'=>'success',
            'body'=>'Usuario registrado correctamente'
        ]);
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function registrarCentroTecnologia(){
        $validar = service('validation');
        
        $validar->setRules([
            'nombreCt'=>'required',
            'encargado'=>'required',
            'descripcion'=>'required',
        ],
        [
            'nombreCt' => [
                    'required' => 'Digite un nombre'
            ],
            'encargado' => [
                'required' => 'Digite un encargado'
            ],
            'descripcion' => [
                'required' => 'Digite una descripcion'
            ]
        ]
        ); 

        if(!$validar->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validar->getErrors());
        }
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function actualizar(){
        $valorRecibido = $_GET['id'];
        $model = model('UsuarioModel');
        $valorMostar = null;
        $buscar = $model->findAll();

        foreach ($buscar as $key) {
            if(password_verify($key->idUsuario,$valorRecibido)){
                $valorMostar = $key->idUsuario;
                break;
            }
        }
        
        return view ('admin/actualizarUsuario',[
            'mostrar' => $model->find($valorMostar)
        ]);
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function actualizarUsuario(){

        $valorRecibido = $_GET['id'];
        $model = model('UsuarioModel');
        $valorMostar = null;
        $usuarioComparar = null;
        $emailComparar = null;
        $telefonoComparar = null;
        $duiComparar = null;
        $buscar = $model->findAll();
        
        foreach ($buscar as $key) {
            if(password_verify($key->idUsuario,$valorRecibido)){
                $valorMostar = $key->idUsuario;
                $usuarioComparar = $key->usuario;
                $emailComparar = $key->email;
                $telefonoComparar = $key->telefono;
                $duiComparar = $key->dui;
                break;
            }
        }

        $validar = service('validation');
        
        $nombre = trim($this->request->getVar('nombre'));
        $apellido = trim($this->request->getVar('apellido'));
        $usuario = trim($this->request->getVar('usuario'));
        $email = trim($this->request->getVar('email'));
        $telefono = trim($this->request->getVar('telefono'));
        $dui = trim($this->request->getVar('dui'));
        $estado = trim($this->request->getVar('estado'));
        $idRol = trim($this->request->getVar('idRol'));


        if($usuario != $usuarioComparar){
            $validar->setRules([
                'usuario'=>'is_unique[tbl_usuarios.usuario]'
            ],
            [
                'usuario' => [
                        'is_unique' => 'El usuario ya se encuentra disponible'
                ],
            ]
            );
            if(!$validar->withRequest($this->request)->run()){
                return redirect()->back()->withInput()->with('errors',$validar->getErrors());
            }
        }

        if($email != $emailComparar){
            $validar->setRules([
                'email'=>'is_unique[tbl_usuarios.email]'
            ],
            [
                'email' => [
                        'is_unique' => 'El correo ya se encuentra disponible'
                ],
            ]
            );
            if(!$validar->withRequest($this->request)->run()){
                return redirect()->back()->withInput()->with('errors',$validar->getErrors());
            }
        }

        if($telefono != $telefonoComparar){
            $validar->setRules([
                'telefono'=>'is_unique[tbl_usuarios.telefono]'
            ],
            [
                'telefono' => [
                        'is_unique' => 'El telefono ya se encuentra disponible'
                ],
            ]
            );
            if(!$validar->withRequest($this->request)->run()){
                return redirect()->back()->withInput()->with('errors',$validar->getErrors());
            }
        }

        if($dui != $duiComparar){
            $validar->setRules([
                'dui'=>'is_unique[tbl_usuarios.dui]'
            ],
            [
                'dui' => [
                        'is_unique' => 'El DUI ya se encuentra disponible'
                ],
            ]
            );
            if(!$validar->withRequest($this->request)->run()){
                return redirect()->back()->withInput()->with('errors',$validar->getErrors());
            }
        }

        $validar->setRules([
            'nombre'=>'required|alpha_space',
            'apellido'=>'required|alpha_space',
            'email'=>'required|valid_email',
            'telefono'=>'required|numeric',
            'dui'=>'required|numeric',
            'estado'=>'required|in_list[0,1]',
            'idRol'=>'required|in_list[1,2]'
        ],
        [
            'nombre' => [
                    'required' => 'Digite un nombre',
                    'alpha_space' => 'Caracteres no permitidos'
            ],
            'apellido' => [
                'required' => 'Digite un apellido',
                'alpha_space' => 'Caracteres no permitidos'
            ],
            'email' => [
                'required' => 'Digite un correo',
                'valid_email' => 'Correo no valido',
              
            ],
            'telefono' => [
                'required' => 'Digite un número de telefono',
                'numeric' => 'Solo digite numeros',
               
            ],
            'dui' => [
                'required' => 'Digite un número de Dui',
                'numeric' => 'Solo digite numeros',
               
            ],
            'estado' => [
                'required' => 'Seleccione un estado valido',
                'in_list' => 'Estado no valido'
               
            ],
            'idRol' => [
                'required' => 'Seleccione un rol valido',
                'in_list' => 'Rol no valido'
            ],
        ]
        );

        if(!$validar->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validar->getErrors());
        }
        $agregarEstado = (int)$estado;

        //dd(old('nombre'));
        
        $dataActualizada= [
            'idUsuario' => $valorMostar,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'usuario' => $usuario,
            'email' => $email,
            'telefono' => $telefono,
            'dui' => $dui,
            'estado' => $agregarEstado,
            'idRol' => $idRol
        ];  

        $model->save($dataActualizada);

        return redirect()->route('search');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function darDeBaja(){

        $valorRecibidoEstado = $_GET['estado'];
        $valorRecibidoId = $_GET['id'];
        $model = model('UsuarioModel');
        $valorMostar = null;
        $buscar = $model->findAll();

        foreach ($buscar as $key) {
            if(password_verify($key->idUsuario,$valorRecibidoId)){
                $valorMostar = $key->idUsuario;
                break;
            }
        }
        $agregarEstado = (int)$valorRecibidoEstado;

        $data = [
         'estado' => $agregarEstado,
         'idUsuario'  => $valorMostar
        ];
        
        $model->save($data);

        return redirect()->route('search');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function volverUsuario(){

        $valorRecibidoEstado = $_GET['estado'];
        $valorRecibidoId = $_GET['id'];
        $model = model('UsuarioModel');
        $valorMostar = null;
        $buscar = $model->findAll();

        foreach ($buscar as $key) {
            if(password_verify($key->idUsuario,$valorRecibidoId)){
                $valorMostar = $key->idUsuario;
                break;
            }
        }
        $agregarEstado = (int)$valorRecibidoEstado;

        $data = [
         'estado' => $agregarEstado,
         'idUsuario'  => $valorMostar
        ];
        
        $model->save($data);

        return redirect()->route('search');
    }
/*-------------------------------------------------------------------------------------------------------------------*/
    public function cerrar(){
        session()->destroy();
        return redirect()->route('index');
    }
}