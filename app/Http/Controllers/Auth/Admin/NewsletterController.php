<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMail;
use App\Models\Customer;
use App\Models\Newsletter;
use App\Models\User;
use App\Notifications\NewsletterPlacedNotification;
use App\Notifications\OrderPlacedNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('adminAuth');
//    }

    public function index($lang)
    {
        if (auth()->guard('admin')->check()) {
            $subscribers = Newsletter::orderBy('created_at', 'DESC')->paginate(15);
            $currentNotice = \App\Models\Notification::where('read_at', '=', null)->first();

            if (!empty($currentNotice)) {
//                $currentNotice->read_at = Carbon::now();
//                $currentNotice->save();
                $currentNotice->delete();
            }
            return view('auth.admin.newsletter.index', ['subscribers' => $subscribers]);
        } else {
            return redirect()->route('index', app()->getLocale());
        }
    }

    public function store($lang, Request $request)
    {
        $this->validate($request, [
            'emailSubscription' => ['required', 'string', 'email', 'max:255', 'unique:newsletters'],

        ]);
        $input = $request->all();
        $newsletterId = new Newsletter;
        $newsletterId->emailSubscription = \request()->input('emailSubscription');

        $newsletterId->update($input);
        $newsletterId->save();

        Mail::to($newsletterId->emailSubscription)->send(new NewsletterMail($newsletterId));
        $user = User::find(1);

        $details = [
            'greeting' => 'Hai ricevuto una nuova iscrizione alla newsletter da Livewire Ecommerce Platform',
            'body' => 'Clicca sul pulsante qui di seguito per visualizzare gli iscritti',
            'thanks' => 'Grazie!',
            'subject' => 'Nuova iscrizione Newsletter',
            'actionText' => 'AREA RISERVATA',
            'actionURL' => url(env('APP_URL') . '/' . app()->getLocale() . env('APP_ADMIN_URL') ),
            'email_subscription' =>   $newsletterId->emailSubscription,
        ];
        Notification::send($user, new NewsletterPlacedNotification($details));

        return redirect()->back()->with('success', 'Hai effettuato l\'iscrizione alla Newsletter con successo!');
    }

    public function unsubscribe($lang, $id)
    {

        $subscriber = Newsletter::where('id', $id)->first();
        $subscriber->delete();

    }

    public function destroy($lang, $id)
    {
        if (auth()->guard('admin')->user()) {
            Newsletter::findOrFail($id)->delete();

            return redirect()->back()
                ->with('success', 'Iscritto eliminato con successo');
        } else {
            abort(404);
        }
    }
}
