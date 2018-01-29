<?php

namespace App\Http\Controllers;
use App\Contact;
use Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function contactmanage(){
        $massage = Contact::orderBy('id', 'desc')->paginate(6);
        return view('admin.Contact.ContactManage',[
            'massage'=>$massage
        ]);
    }
    public function contactDelet($id) {
        $ContactsById = Contact::find($id);
        $ContactsById->delete();

        return redirect('/contact/manage')->with('message', 'Contact info delete successfully');
    }

    public function composeEmail(){
        return view('admin.email.message');
    }

    public function contactReply($id){
        $contacts = Contact::find($id);
        /*return $contacts;*/
        return view('admin.email.message',['contact'=>$contacts]);
    }

    public function sendemail(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message_body' => 'min:5',
            'message_image' => 'mimes:png,jpg,jpeg,gif,pdf,svg,text,ppt,docx,doc,xls'
        ]);

        $data = $request->toArray();

        Mail::send('admin.email.compose', $data, function ($message) use ($data){
            $message->from('shakil@mahmud.com', 'Trendy Blog');
        
            $message->to($data['email']);
        
            $message->replyTo('john@johndoe.com', 'John Doe');
        
            $message->subject($data['subject']);
        
            $message->priority(6);
            if (isset($data['message_image'])) {
                $message->attach($data['message_image']->getRealPath(),$arrayName = array('as' =>'message_image'.$data['message_image']->getClientOriginalExtension(),
            'mime'=>$data['message_image'] ->getMimeType()) 
            );
            }
        
            
       
        });
            return    redirect()->back()->with('message', 'message sent successfully');
    }

}
