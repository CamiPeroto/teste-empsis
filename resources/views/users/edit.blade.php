@extends('layouts.admin')

@section('content-box')
    <div class="content-box-header">
        <h3 class="content-box-title">Editar Usuário</h3>
        <div class="content-box-btn">
            <a href="{{ route('user.index') }}" class="btn-primary">
                <x-heroicon-o-arrow-long-left class="w-6 h-6" />
            </a>
        </div>
    </div>

    <form action="{{ route('user.update') }}" method="POST">
        @csrf
        @method('POST')

        <div class="grid grid-cols-2 gap-x-4 gap-y-2">
            <div class="mb-4">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-input" placeholder="Nome Completo"  value="{{ old('name', $user->name) }}">
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-input" placeholder="email@example.com"  value="{{ old('email', $user->email) }}">
            </div>

        </div>

        <div class="grid grid-cols-2 gap-x-4 gap-y-2">

            <div class="mb-4">
                <label for="phone_number" class="form-label">Telefone</label>
                <input type="text" name="phone_number" id="phone_number" class="form-input"
                    placeholder="(42) 9 9999-9999"  value="{{ old('phone_number', $user->phone_number) }}">
            </div>

            <div class="mb-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-input" placeholder="Digite o CPF" value="{{ old('cpf', $user->cpf) }}">
            </div>
        </div>
        <h3 class="content-box-title my-2 border-b border-gray-300">Endereço: </h3>

        <div class="grid grid-cols-2 gap-x-4 gap-y-2">
            <div class="mb-4">
                <label for="street" class="form-label">Rua</label>
                <input type="text" name="street" id="street" class="form-input" placeholder="Nome da Rua" value="{{ old('street', $user->street) }}">
            </div>
            <div class="mb-4">
                <label for="number" class="form-label">Número</label>
                <input type="text" name="number" id="number" class="form-input" placeholder="N°" value="{{ old('number', $user->number) }}">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-x-4 gap-y-2">
            <div class="mb-4">
                <label for="district" class="form-label">Bairro</label>
                <input type="text" name="district" id="district" class="form-input" placeholder="Bairro" value="{{ old('district', $user->district) }}">
            </div>
            <div class="mb-4">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" name="city" id="city" class="form-input" placeholder="Nome da Cidade" value="{{ old('city', $user->city) }}">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-x-4 gap-y-2">
            <div class="mb-4">
                <label htmlFor="state" class="form-label">UF </label>
                <select id="state" class="form-input"  name="state" value="{{ old('phone_number', $user->phone_number) }}" >
                    <option value="">Selecione a UF</option>
                    @foreach($states as $state)
            <option value="{{ $state }}" {{ $user->state == $state ? 'selected' : '' }}>
                {{ $state }}
            </option>
        @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="city" class="form-label">CEP</label>
                <input type="text" name="zip_code" id="zip_code" class="form-input" placeholder="CEP" value="{{ old('phone_number', $user->phone_number) }}">
            </div>
        </div>

        <button type="submit" class="btn-success">Salvar</button>

    </form>
@endsection
