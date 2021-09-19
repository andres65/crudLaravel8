<?php

namespace App\Http\Controllers;

use App\Models\TbRole;
use Illuminate\Http\Request;

/**
 * Class TbRoleController
 * @package App\Http\Controllers
 */
class TbRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbRoles = TbRole::paginate();

        return view('tb-role.index', compact('tbRoles'))
            ->with('i', (request()->input('page', 1) - 1) * $tbRoles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tbRole = new TbRole();
        return view('tb-role.create', compact('tbRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TbRole::$rules);

        //$tbRole = TbRole::create($request->all());

        TbRole::insert([
            'nombre' => $request['nombre'],
            'estado' => 1,
        ]);

        return redirect()->route('tb-roles.index')
            ->with('success', 'Rol creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tbRole = TbRole::find($id);

        return view('tb-role.show', compact('tbRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tbRole = TbRole::find($id);

        return view('tb-role.edit', compact('tbRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TbRole $tbRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(TbRole::$rules);

        //$tbRole->update($request->all());

        $tbRole = ([
            'nombre' => $request['nombre'],
            'estado' => $request['estado'],
        ]);

        TbRole::where('id', '=', $id)->update($tbRole);

        return redirect()->route('tb-roles.index')
            ->with('success', 'Rol editado con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tbRole = TbRole::find($id)->delete();

        return redirect()->route('tb-roles.index')
            ->with('success', 'TbRole deleted successfully');
    }
}
