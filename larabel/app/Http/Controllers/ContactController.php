<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CantactRequest;
use App\Models\Contact;

use function GuzzleHttp\Promise\all;

class ContactController extends Controller{

    public function submit(CantactRequest $req ){
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');
        $contact->save();
        return redirect()->route('home')->with('success','Сообщение было добавлено!');
    }
    public function allData(){
        $contact = new Contact;
        // $contact->orderBy('id','desc')->get() -> skip()-> take(1) where('subject','=','hello')->get()
        return view('messages',['data'=> $contact->all() ]);
    }
    public function showOneMessage($id){
        $contact = new Contact;
        return view('one-messages', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id)
    {
        $contact = new Contact;
        return view('update-message', ['data' => $contact->find($id)]);
    }


    public function updateMessageSubmit($id, CantactRequest $req)
    {
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');
        $contact->save();
        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено!');
    }


    public function deleteMessage($id)
    {
        $contact = Contact::find($id)->delete();

        return redirect()->route('contact-data')->with('success', 'Сообщение было удалено!');
    }

}