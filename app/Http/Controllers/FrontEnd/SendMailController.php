<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Mail\SendMailProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('pages.contacts');
    }

    public function sendmail()
    {

        $this->request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:900',
            'g-recaptcha-response' => 'required'
        ]);
        Mail::to('magazzino@italianisrl.com')
            ->cc('acquisti@italianisrl.com')
            ->send(new SendMail($this->request));
        return back()->with('success', 'Grazie per averci contattato. Riceverai a breve una risposta.');
    }

    public function sendProduct()
    {

        $this->request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:900',
            'g-recaptcha-response' => 'required'
        ]);
        Mail::to('magazzino@italianisrl.com')
            ->cc('acquisti@italianisrl.com')
            ->send(new SendMailProduct($this->request));
        return back()->with('success', 'Grazie per averci contattato. Riceverai a breve una risposta.');
    }

    public function sendSuccess()
    {
        if (!$this->request->status == 'mailSuccess')
            abort(404);
        return back()->with('success', 'Grazie per averci contattato. Riceverai a breve una risposta.');
    }
}
