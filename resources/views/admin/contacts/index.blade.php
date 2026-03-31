@extends('layouts.app')

@section('title', 'Contatos Recebidos')

@section('content')
    <div class="card">
        <div class="top-actions">
            <h1>Contatos Recebidos</h1>
            <a href="{{ route('contact.create') }}" class="btn">Voltar ao formulário</a>
        </div>

        @if($contacts->count())
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Assunto</th>
                            <th>Mensagem</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone ?: '-' }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrapper">
                {{ $contacts->links() }}
            </div>
        @else
            <p>Nenhum contato foi enviado até o momento.</p>
        @endif
    </div>
@endsection
