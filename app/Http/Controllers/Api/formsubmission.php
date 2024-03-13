<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\minion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class formsubmission extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // echo "hello";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //print_r($request->all());
      
        //echo "helo";
        // $Name = $request->input('name');
        // $email = $request->input('email');
        // $password = $request->input('password');                         
        $validator =Validator::make($request->all(),[
            'name'=>['required'],
            'email'=>['required','email','unique:users,email'],
            'roles'=>['required'],
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }else{
            $data=[
                'username'=> $request->name,
                'emailaddress'=>$request->email,
                'roles'=> $request->roles,
            ];
            try{
                    DB::beginTransaction();
                    $user = minion::create($data);
                    DB::commit();
            }catch(\Exception $e){
                DB::rollBack();
                $user = null;
            }
                if($user != null){
                    return response()->json([
                        'message' => "User registration successfully",
                    ]);
                }
                else{
                    return response()->json([
                        'message' => 'invalide credentials',
                    ]);
                }
          
        }


        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function  hello(){
        // dd("hello");
        echo "hello";
    }
}
