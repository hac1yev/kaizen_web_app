<?php

namespace App\Http\Controllers\Back\ContactController;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactListIndex(){
        $messages = Contact::orderBy('created_at','desc')->get();
        return view('back.contact.list',compact('messages'));
    }
    public function contactGetMessage(Request $request){
        $message = Contact::find($request->id);
        $message->status = '1';
        $message->save();
        return $message ?? response()->json('0');
    }
    public function contactDelete(Request $request){
        $message = Contact::find($request->id);
        if(!$message){
            return response()->json('0');
        }
        return $message->delete() ? response()->json('1') : response()->json('0');
    }
    public function contactReply(Request $request){
        $request->validate([
           'id'=>'required',
           'message'=>'required|min:3',
        ]);
        $message = Contact::find($request->id);
        $message->isanswer = '1';
        return redirect()->back()->with($message->save() ? 'success' : 'error',true);
    }
}
