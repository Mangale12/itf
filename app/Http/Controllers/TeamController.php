<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Str;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::query()->latest()->paginate(10);
        // if(Route::is('teams.index')){
        //     $teams = Team::query()->latest()->paginate(10);
        // }
        // elseif(Route::is('team.new_new')){
        //     $contacts = Contact::where("team_assigned",0)->get();
        // }
        // elseif(Route::is('contact.team_contact')){
        //     $contacts = Contact::where("team_assigned",1)->get();
        // }
        // $teams = Team::get();
        return view('admin.Team.index',compact('teams'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'contact_no' => 'required',
            'position' => 'required',
            'active' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $fileName = null;
        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'),$fileName);
        }


        $user = new Team;
        $user->name = $request->input('name');
        $user->slug = Str::slug($request->input('name'));
        $user->address = $request->input('address');
        $user->email = $request->email[0] != null?$request->email[0]:null;
        $user->contact_no = $request->contact_no[0] != null?$request->contact_no[0]:null;
        $user->position = $request->input('position');
        $user->active = $request->input('active');
        $user->facebook = $request->input('facebook');
        $user->instagram = trim($request->input('instagram'));

        $user->image = $fileName;
        $teamImages = [];
        if($request->hasFile('team_image')){
            foreach($request->file('team_image') as $key=>$teamImage){


                $teamImageName  = time().'.'.$teamImage->extension();
                // $teamImage->move(public_path('uploads/images'),$teamImageName);
                $teamImages[]= [
                    $key=>$teamImageName,
                ];
            }
        }
        $user->team_images=json_encode($teamImages);
        $user->save();

        return redirect()->route('teams.index')->with([
            'message' => 'User added successfully!',
            'status' => 'success'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return response();
    }
    public function view(Request $request){
        $team = Team::where("id",$request->team)->first();
        if($team->contact->count()>0){
            $contact = $team->contact;
        }
        else{
            $contact = null;
        }
        $data = [
            'data'=>$team,
            'contact'=>$contact,
                ];
        return response()->json($data);
    }

    public function achievement(Request $request){
        $team = Contact::where('id',$request->member_id)->first();
        $team->achievement = $request->achievement;
        $team->save();
        return response()->json(['achievement'=>$request->achievement]);
    }
    public function contact_details(Request $request){
        $contact = Contact::where('id',$request->member_id)->first();
        return response()->json(["contact"=>$contact]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.Team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'position' => 'required',
            'active' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',

            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $team = Team::where('id',$id)->first();
        $team->name = $request->name;
        $team->slug = Str::slug($request->input('name'));
        $team->email = $request->email[0] != null?$request->email[0]:null;
        $team->address = $request->address;
        $team->contact_no = $request->contact_no[0] != null?$request->contact_no[0]:null;
        $team->position = $request->position;
        $team->active = $request->active;
        $team->facebook = $request->facebook;
        $team->instagram = $request->instagram;

        $fileName = null;
        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'),$fileName);
        }else{
            $fileName = $team->image;
        }
        $team->image = $fileName;
        $team->update();
        return redirect()->route("teams.index");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
