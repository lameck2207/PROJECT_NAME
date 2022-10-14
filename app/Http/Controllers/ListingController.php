<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    // Show all listings
    public function index(Request $request) {
        return view('listings.index', [
            'Listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate()
        ]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listing.show', [
            'Listing' => $listing
        ]);
    }
    // Show Create Form
    public function create() {
        return view('listings.create');
    }
    // Store Listing Data 
    public function store(Request $request) {
     $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required', Rule::unique('listings', 'company')],
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required'
     ]);

    if($request->hasFile('logo')) {
      $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

$formFields['user_id'] = auth()->id();

Listing::create($formFields);

     return redirect('/')->with('messege', 'Listing Created Successfully');
    }
    // Show Edit Form
    public function edit(Listing $listing) {
      return view('listings.edit', ['listing' => $listing]);  
    }

    // Update Listing Data 
    public function update(Request $request, Listing $listing) {

// Make sure logged in user is owner
if($listing->user_id != auth()->id()) {
    abort(403, 'Unauthorized Action');
}

        $formFields = $request->validate([
           'title' => 'required',
           'company' => ['required'],
           'location' => 'required',
           'website' => 'required',
           'email' => ['required', 'email'],
           'tags' => 'required',
           'description' => 'required'
        ]);
   
       if($request->hasFile('logo')) {
         $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }
   
   
  $listing->update($formFields);
   
   
   
        return back()->with('messege', 'Listing Updated Successfully!');
       }

       // Delete Listing
       public function destroy(Listing $listing) {
// Make sure logged in user is owner
if($listing->user_id != auth()->id()) {
    abort(403, 'Unauthorized Action');
}

       $listing->delete();
      return redirect('/')->with('message', 'Listing deleted successfully');
       }

       // Manage Listing
       public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listing()->get()]);
       }
}
