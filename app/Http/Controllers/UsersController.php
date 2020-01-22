<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // return User::get();
      return response()->json([
          'data' => User::get(),
          'success' => true
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $message = 'L\'utente è stato creato correttamente';
        try {
            $User = new User();
            $postData = $request->except('id', '_method');
            $data['password'] = Hash::make('password');
            $User->fill($postData);
            $success = $User->save();
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $success = false;
        }
        return compact('data', 'message', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $message = 'Dettagli dati utente';
        try {
            // return response()->json([
            //     'data' => User::findOrFail($id),
            //     'success' => true
            // ]);
           $data = User::findOrFail($id);
           $success = true;

        } catch (\Exception $e) {
            // return response()->json([
            //     'data' => [],
            //     'message' => $e->getMessage(),
            //     'success' => false
            // ]);
            $success = false;
            $message = $e->getMessage();
        }

        return compact('data', 'message', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = [];
        $message = 'L\'utente è stato modificato correttamente';
        try {

            // return response()->json(
            //     ['data' => User::findOrFail($id),

            //     ]);
            $User = User::findOrFail($id);
            $success = true;
            $postData = $request->except('id', '_method');
            $data['password'] = Hash::make('password');
            $success = $User->update($postData);
            $data = $User;

        } catch (\Exception $e) {
            // return response()->json([
            //     'data' => [],
            //     'message' => $e->getMessage(),
            //     'success' => false
            // ]);
            $message = $e->getMessage();
            $success = false;
        }
        return compact('data', 'message', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
