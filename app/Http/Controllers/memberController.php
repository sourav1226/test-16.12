<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use App\Models\role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=DB::table('roles')->get();
        return view('index')->with('roles', $roles);
    }
    public function view()
    {
        $members = member::all();
         return view('view')->with('members', $members);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:members',
            'password' => 'required',
            'phone' => 'required|unique:members',
            'city' => 'required',
            'gender' => 'required',
            'meretial_status' => 'required',
            'role_id' => 'required',
            'sub_role_id' => 'required',
        ]);
        $members =new member;
        $members->name = $request->input('name');
        $members->email = $request->input('email');
        $members->password = hash::make($request->input('password'));
        $members->phone = $request->input('phone');
        $members->city = $request->input('city');
        $members->gender = $request->input('gender');
        $members->meretial_status = $request->input('meretial_status');
        $members->dob = $request->input('dob');
        $members->role_id = $request->input('role_id');
        $members->sub_role_id = $request->input('sub_role_id');
        $members -> save();
        return redirect()->back()->with('status', 'Successfully Add a New Member');
    }

    public function getSubrole(Request $request) {
        $cid=$request->post('cid');
        if($cid==1){
        $role=DB::table('roles')->find($cid);
		$html='<option value="'.$role->id.'">'.$role->name.'</option>';
		
		echo $html;
        }
        else{
            $role=DB::table('roles')->take($cid-1)->get();
            $html='<option value="">Select Sub Role</option>';
            foreach($role as $list){
                $html.='<option value="'.$list->id.'">'.$list->name.'</option>';
            }
            echo $html;
        }
        
    }
    public function tree_view()
    {
        $members = member::where('role_id', '=', 1)->get();
        $leaders= member::where('role_id', '=', 2)->get();
        $seniors= member::where('role_id', '=', 3)->get();
        $juniors= member::where('role_id', '=', 4)->get();
        return view('tree')->with('members' , $members)->with('leaders' , $leaders)->with('seniors' , $seniors)->with('juniors' , $juniors);

       
       
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        
        $member = member::find($id);
        $all_roles= role::all();
        
        return view('/edit')->with('member', $member)->with( 'all_roles', $all_roles);
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
        
        $member = member::find($id);
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->password = hash::make($request->input('password'));
        $member->phone = $request->input('phone');
        $member->city = $request->input('city');
        $member->gender = $request->input('gender');
        $member->meretial_status = $request->input('meretial_status');
        $member->dob = $request->input('dob');
        $member->role_id = $request->input('role_id');
        $member->sub_role_id = $request->input('sub_role_id');
        $member -> update();
       return redirect()->back()->with('status', 'Successfully Update Data');
    }
    public function search(Request $request)
    {
        
        $search_text = $request->get('query');
       $members= member::where('name', '%'.$search_text.'%')->get();
       return view('search')->with('members', $members);
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $member = member::find($id);
        $member->delete();
        return redirect()->back()->with('status', 'Successfully Deleted Data');
    }
}
