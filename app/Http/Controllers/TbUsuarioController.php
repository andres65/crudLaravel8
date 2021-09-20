<?php

namespace App\Http\Controllers;

use App\Models\TbUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

/**
 * Class TbUsuarioController
 * @package App\Http\Controllers
 */
class TbUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbUsuarios = TbUsuario::paginate(10);
        //$tbUsuarios = DB::table('tb_usuarios')->where('estado', '=', 1)->get();
        //$perPage = 20;

        //datos eps y roles
        $eps = DB::table('tb_eps')->where('estado', '=', 1)->get();
        $roles = DB::table('tb_roles')->where('estado', '=', 1)->get();

        return view('tb-usuario.index', compact('tbUsuarios','eps','roles'))
            ->with('i', (request()->input('page', 1) - 1) * $tbUsuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eps = DB::table('tb_eps')->where('estado', '=', 1)->get();
        $roles = DB::table('tb_roles')->where('estado', '=', 1)->get();

        $tbUsuario = new TbUsuario();
        return view('tb-usuario.create', compact('tbUsuario','eps','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TbUsuario::$rules);

        //$tbUsuario = TbUsuario::create($request->all());
        $pass = Hash::make($request['documento']);
        $estado = 1;
        
        $tbUsuario = TbUsuario::insert([
            'nombre' => $request['nombre'],
            'documento'=> $request['documento'],
            'password' => $pass,
            'genero' => $request['genero'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'telefono' => $request['telefono'],
            'eps_id' => $request['eps_id'],
            'rol_id' => $request['rol_id'],
            'estado' => $estado,
            'email' => $request['email'],
        ]);

        if($tbUsuario){
            User::create([
                'name' => $request['nombre'],
                'email' => $request['email'],
                'password' => $pass,
            ]);
        }

        return redirect()->route('tb-usuarios.index')
            ->with('success', 'Usuario creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tbUsuario = TbUsuario::find($id);

        $eps = DB::table('tb_eps')->where('estado', '=', 1)->get();
        foreach($eps as $item){
            if($tbUsuario->eps_id == $item->id){
                $nombreeps = $item->nombre;
            }
        }

        $roles = DB::table('tb_roles')->where('estado', '=', 1)->get();
        foreach($roles as $item){
            if($tbUsuario->rol_id == $item->id){
                $nombrerol = $item->nombre;
            }
        }

        return view('tb-usuario.show', compact('tbUsuario','nombreeps','nombrerol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tbUsuario = TbUsuario::find($id);

        //validar genero
        if($tbUsuario->genero == 'M'){
            $genero = 'Masculino';
        }elseif($tbUsuario->genero == 'F'){
            $genero = 'Femenino';
        }else{
            $genero = 'Otro';
        }
        
        //datos eps y roles
        $eps = DB::table('tb_eps')->where('estado', '=', 1)->get();
        $roles = DB::table('tb_roles')->where('estado', '=', 1)->get();

        return view('tb-usuario.edit', compact('tbUsuario','genero','eps','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TbUsuario $tbUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(TbUsuario::$rules);

        //$tbUsuario->update($request->all());

        //validar para cambio de password
        // if($request['password'] != ''){
        //     $pass = Hash::make($request['password']);
        // }else{
        //     $pass = $request['password_antiguo'];
        // }
        $pass = $request['password_antiguo'];

        $tbUsuario = ([
            'nombre' => $request['nombre'],
            'documento'=> $request['documento'],
            'password' => $pass,
            'genero' => $request['genero'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'telefono' => $request['telefono'],
            'eps_id' => $request['eps_id'],
            'rol_id' => $request['rol_id'],
            'estado' => $request['estado'],
            'email' => $request['email'],
        ]);

        $update = TbUsuario::where('id', '=', $id)->update($tbUsuario);

        // if($update){
        //     $Usuario = ([
        //         'name' => $request['nombre'],
        //         'email' => $request['email'],
        //         'password' => $pass,
        //     ]);

        //     User::where('id', '=', $id)->update($Usuario);
        // }

        return redirect()->route('tb-usuarios.index')
            ->with('success', 'Usuario editado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //$tbUsuario = TbUsuario::find($id)->delete();

        $tbUsuario = ([ 'estado' => 0 ]);
        $update = TbUsuario::where('id', '=', $id)->update($tbUsuario);
        
        if($update){
            $usuario = TbUsuario::find($id);
            $email = $usuario->email;
            User::where('email', '=', $email)->delete();
        }

        return redirect()->route('tb-usuarios.index')
            ->with('success', 'Usuario Eliminado con éxito');

    }

}
