<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::withTrashed()->get();
        return view('contacts.index', compact('contacts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6|max:255',
            'contact' => 'required|digits:9|unique:contacts,contact',
            'email' => 'required|email|unique:contacts,email',
        ],
        [
            'contact.unique' => 'O contato já existe.',
            'email.unique' => 'O email já existe como contato.',
            'name.required' => 'O nome é obrigatório.',
            'contact.required' => 'O contato é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 6 caracteres.',
            'contact.digits' => 'O contato deve ter exatamente 9 dígitos.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'contact.max' => 'O contato não pode ter mais de 9 dígitos',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|min:6|max:255',
            'contact' => 'required|digits:9|unique:contacts,contact,' . $contact->id,
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
        ],
        [
            'contact.unique' => 'O contato já existe.',
            'email.unique' => 'O email já existe como contato.',
            'name.required' => 'O nome é obrigatório.',
            'contact.required' => 'O contato é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 6 caracteres.',
            'contact.digits' => 'O contato deve ter exatamente 9 dígitos.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contato excluido com sucesso.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $contact = Contact::withTrashed()->findOrFail($id);

        $contact->restore();

        return redirect()->route('contacts.index')->with('success', 'Contato restaurado com sucesso.');
    }
}
