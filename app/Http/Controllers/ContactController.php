<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Make sure to import your Firebase service here
use App\Services\FirebaseService;

class ContactController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $firestore = $this->firebase->getFirestore();
        $db = $firestore->database();

        $db->collection('contact')->add([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now()->toDateTimeString(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Contact form submitted successfully!',
        ]);
    }
}
