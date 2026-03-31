<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Exibe o formulário de contato.
     */
    public function create(): View
    {
        return view('contacts.create');
    }

    /**
     * Salva um novo contato no banco de dados.
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Contact::create([
            'name' => trim($validated['name']),
            'email' => trim($validated['email']),
            'phone' => isset($validated['phone']) ? trim($validated['phone']) : null,
            'subject' => trim($validated['subject']),
            'message' => trim($validated['message']),
        ]);

        return redirect()
            ->route('contact.create')
            ->with('success', 'Sua mensagem foi enviada com sucesso.');
    }

    /**
     * Lista os contatos recebidos.
     */
    public function index(): View
    {
        $contacts = Contact::latest()->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }
}
