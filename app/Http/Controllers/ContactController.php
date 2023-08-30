<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Route;
use App\Mail\AssignTeam;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Route::is('contacts.index')){
            $contacts = Contact::query()->latest()->paginate(10);
        }
        elseif(Route::is('contact.new_contact')){
            $contacts = Contact::where("team_assigned",0)->get();
        }
        elseif(Route::is('contact.team_contact')){
            $contacts = Contact::where("team_assigned",1)->get();
        }
        $teams = Team::get();
        return view('admin.Contact.index',compact('contacts','teams'));
    }

    public function teamAssign(Request $request){
        $contact = Contact::where('id',$request->contact)->first();
        $contact->team_id = $request->team;
        $contact->team_assigned = 1;
        $contact->save();

        // $team = Team::where("id",$request->team)->first()->toArray();
        // $data = [
        //     'contact'=>$request->name,
        //     'team'=>$team,
        //     'subject'=>"Assigned to a Team",
        // ];

        // try{
        //     Mail::to("mangaletamang65@gmail.com")->send(new AssignTeam(json_encode($data)));
        //     // Mail::to($form->email)->send(new MailToAdmin(($details)));
        // }
        // catch(\Exception $e){
        //     dd($e);
        // }
        return response()->json($contact);



    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $teams = Team::get();
        return view('admin.Contact.create',compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);


        $contact = Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'team_id'=>$request->team
        ]);


        return redirect("contacts")->route()->with('success','Contact has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show',compact('contact'));
    }
    public function edit(Contact $contact)
    {
        $teams = Team::get();
        return view('admin.Contact.edit',compact('contact','teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->team_id = $request->team;
        $contact->save();

        return redirect()->route('contacts.index')->with('success','Contact Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success','Contact has been deleted successfully');
    }
}
