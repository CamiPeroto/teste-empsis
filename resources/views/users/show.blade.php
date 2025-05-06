@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <h2 class="content-title">{{ $user->name }}</h2>
            <nav class="breadcrumb">
                <a href="{{ route('user.index') }}" class="breadcrumb-link">Usuários</a>
                <span>/</span>
                <span>Visualizar</span>
            </nav>
        </div>
    </div>
@endsection

@section('content-box')
    <div class="content-box-header">
        <h3 class="content-box-title">Informações</h3>
        <div class="content-box-btn">
            <a href="{{ route('user.index') }}" class="btn-info">
                <x-heroicon-o-list-bullet class="w-6 h-6" />
            </a>
            <a href="#" class="btn-warning">
                <x-heroicon-o-pencil-square class="w-6 h-6" />
            </a>
        </div>
    </div>

    <div class="detail-box">
        <div class="mb-1">
            <span class="detail-content">CPF: </span> {{ $user->cpf }}
        </div>
        <div class="mb-1">
            <span class="detail-content">Nome: </span> {{ $user->name }}
        </div>
        <div class="mb-1">
            <span class="detail-content">E-mail: </span> {{ $user->email }}
        </div>
        <div class="mb-1">
            <span class="detail-content">Telefone: </span> {{ $user->phone_number }}
        </div>
        <div class="mb-1">
            <span class="detail-content"> Cadastrado Em: </span>
            {{ \Carbon\Carbon::parse($user->created_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}
        </div>
        <div class="mb-1">
            <span class="detail-content"> Editado Em: </span>
            {{ \Carbon\Carbon::parse($user->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}
        </div>
        <h3 class="content-box-title my-2 border-t border-gray-300">Endereço: </h3>
    </div>
    <div class="mb-1">
        <span class="detail-content">Rua: </span> {{ $user->street }}
    </div>
    <div class="mb-1">
        <span class="detail-content">Número: </span> {{ $user->number }}
    </div>
    <div class="mb-1">
        <span class="detail-content">Bairro: </span> {{ $user->district }}
    </div>
    <div class="mb-1">
        <span class="detail-content">Estado: </span> {{ $user->state }}
    </div>
    <div class="mb-1">
        <span class="detail-content">CEP: </span> {{ $user->zip_code }}
    </div>

    </div>
@endsection
