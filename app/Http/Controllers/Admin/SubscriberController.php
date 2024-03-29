<?php

namespace App\Http\Controllers\Admin;
use App\Models\Subscriber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function show_subscriber()
    {
        $subscriber = Subscriber::latest()->paginate(10);

        return view('admin.subscriber.show_subscriber' , compact('subscriber'));
    }

    public function add_subscriber(Request $request)
    {
        $subscriber = new Subscriber;

        $subscriber->email = $request->email;

        $subscriber->save();

        return redirect()->back()->with( 'message' , 'Subscriber Added');
    }

    public function update_subscriber(Request $request , $id)
    {
        $subscriber = Subscriber::find($id);

        $subscriber->email = $request->email;

        $subscriber->save();

        return redirect()->back()->with( 'message' , 'Subscriber Updated');

    }

    public function delete_subscriber($id)
    {
        $subscriber = Subscriber::find($id);

        $subscriber->delete();

        return redirect()->back()->with( 'message' , 'Subscriber Delete');

    }

    // public function sendEmailToSubscribers(Request $request)
    // {
    //     // Validate the form inputs
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'text' => 'required|string',
    //     ]);

    //     // Get all subscribers
    //     $subscribers = Subscriber::all();

    //     // Loop through each subscriber and send email
    //     foreach ($subscribers as $subscriber) {
    //         // Send email to subscriber
    //         Mail::to($subscriber->email)->send(new YourEmailMailable($request->title, $request->text));
    //     }

    //     // Redirect back with success message
    //     return back()->with('success', 'Emails sent successfully to all subscribers.');
    // }
}
