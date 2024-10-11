<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('inner list');
        //return Inertia::render('Contact/Index');
        return Inertia::render('Contact/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return Inertia::render('Contact/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data= $request->only('name','phone','visibility');

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $routeImage = $file->store('avatars',['disk' => 'public']);
            $data['avatar'] = $routeImage;  
        } 
        
        $data['user_id'] = auth()->user()->id;
        
        Contact::create($data);

        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
