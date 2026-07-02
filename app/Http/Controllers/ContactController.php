<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a new contact message from the public form.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'post_code' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'heard_from' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Pesan berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }

    /**
     * Admin: list all contact messages.
     */
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(15);
        return view('admin.contact.index', compact('messages'));
    }

    /**
     * Admin: show a single contact message.
     */
    public function show(ContactMessage $contact_message)
    {
        $contact_message->update(['is_read' => true]);
        return view('admin.contact.show', compact('contact_message'));
    }

    /**
     * Admin: delete a contact message.
     */
    public function destroy(ContactMessage $contact_message)
    {
        $contact_message->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
