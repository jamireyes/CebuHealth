<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\role;
use DataTables;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->get();
        $roles = role::all();
        return view('Account.index', compact('users', 'roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('Account.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'email' => 'required|string|email|max:255',
            'username' => 'required|string|max:255',
            'RoleID' => 'required',
        ));

        $data = User::find($id);
        $data->email = $request->input('email');
        $data->username = $request->input('username');
        $data->RoleID = $request->input('RoleID');
        $data->save();

        return redirect('/Account')->with('success', 'Account Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect('/Account')->with('success', 'Account Removed!');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id)->restore();
        return redirect('/Account')->with('success', 'Account Restored!');
    }

    public function export(Request $request)
    {
        $users = $request->input('data');
        //return Excel::download((new UsersExport)->setUsers($users), 'users.xlsx');
    }
}
