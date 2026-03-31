@extends('layouts.app')

@section('title', 'Formulário de Contato')

@section('content')
    <div class="card">
        <div class="top-actions">
            <h1>Fale Conosco</h1>
            <a href="{{ route('admin.contacts.index') }}" class="btn">Ver contatos recebidos</a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-danger">
                Existem erros no formulário. Verifique os campos abaixo.
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="label">Nome *</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="input"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="label">E-mail *</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="input"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="label">Telefone</label>
                <input
                    type="text"
                    name="phone"
                    id="phone"
                    class="input"
                    value="{{ old('phone') }}"
                >
                @error('phone')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="subject" class="label">Assunto *</label>
                <input
                    type="text"
                    name="subject"
                    id="subject"
                    class="input"
                    value="{{ old('subject') }}"
                >
                @error('subject')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="label">Mensagem *</label>
                <textarea
                    name="message"
                    id="message"
                    class="textarea"
                >{{ old('message') }}</textarea>
                @error('message')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Enviar mensagem</button>
        </form>
    </div>
@endsection
