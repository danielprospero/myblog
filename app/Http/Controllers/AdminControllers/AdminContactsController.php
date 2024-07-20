<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactsController extends Controller
{
    public function index()
    {
        return view('admin_dashboard.contacts.index', [
            'contacts' => Contact::paginate(10)
        ]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts')->with('success', 'Contato deletado com sucesso!');
    }

}
