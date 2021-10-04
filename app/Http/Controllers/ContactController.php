<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;

use Illuminate\Support\Carbon;
class ContactController extends Controller
{
    //
    public function __construct(){
       $this->middleware('auth');
    }

    public function index(){
        $contacts = Contact::all()->first();
        return view('pages.contactpage',['contacts'=>$contacts]);
    }

    public function contact_account(){
        $contacts = Contact::all();
        return view('admin.contact.contact_account',['contacts'=>$contacts]);
    }

    public function addContact(){
        return view('admin.contact.contact_form');
    }

    public function contactstore(Request $req){
        $validatoin  = $req->validate(
            [
                'email' => 'required'
            ],
            [
                'email.required' => 'please enter valid email address'
            ]
        );


        $contact = new Contact;
        $contact->location = $req->location;
        $contact->email = $req->email;
        $contact->phone = $req->phone;
        $contact->created_at = Carbon::now();
        $contact->save();
        $notification= ['alert-type' =>'success',
        'message' => ' Contact Added Succesfully'];
        return redirect()->route('contact.profile')->with( $notification);
    }


    public function editContact($id){
        $contact = Contact::find($id);
        return view('admin.contact.edit',['contacts'=> $contact]);
    }
    public function updateContact(Request $req){
        $contact = Contact::find($req->id);
        $contact->location = $req->location;
        $contact->email = $req->email;
        $contact->phone = $req->phone;
        $contact->save();
        $notification= ['alert-type' =>'success',
        'message' => 'Updated Successfully'];
        return redirect()->route('contact.profile')->with( $notification);
    }

    public function deleteContact($id){
        $delete = Contact::find($id)->delete();
        $notification= ['alert-type' =>'success',
        'message' => ' Deleted Successfully'];
        return redirect()->route('contact.profile')->with( $notification);
    }


    public function msgstore(Request $req){
        $contact = new ContactForm;
        $data = $req->input('name');
        $req->session()->flash('user',$data);
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->phone = $req->phone;
        $contact->subject = $req->subject;
        $contact->message = $req->message;
        $contact->created_at = Carbon::now();
        $contact->save();
        $notification= ['alert-type' =>'success',
        'message' => 'Message Sent'];
        return redirect('Contactpage')->with( $notification);
    }
    public function msgreceive(){
        $contact =  ContactForm::all();
        return view('admin.contact.contact_message',['contacts'=>$contact]);
    }
    public function trashList(){
        $trash_lists = ContactForm::onlyTrashed()->latest()->paginate(5);
        return view('admin.contact.trash_contact',['trashlists'=>$trash_lists]);
    }
    public function softdeleteContact($id){
        $softdelete = ContactForm::find($id)->delete();
        $notification= ['alert-type' =>'success',
        'message' => 'Move To Trashed Succesfully'];
        return redirect()->route('admin.message')->with( $notification);
    }
    public function restore($id){
        $restore = ContactForm::withTrashed()->find($id)->restore();
        $notification= ['alert-type' =>'success',
        'message' => ' Restored The Message Succesfully'];
        return redirect()->route('admin.message')->with( $notification);
    }
    public function delete($id){
        $restore = ContactForm::onlyTrashed()->find($id)->forcedelete();
        $notification= ['alert-type' =>'success',
        'message' => ' Deleted The Message Succesfully'];
        return redirect()->route('admin.message')->with( $notification);
    }

}
