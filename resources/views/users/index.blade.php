@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <h2 class="content-title">Usuários</h2>
    <nav class="breadcrumb">
        <a href="#" class="breadcrumb-link">Usuários</a>
        <span>/</span>
        <span>Listar</span>
    </nav>
  </div>
</div>
@endsection

@section('content-box')

<div class="content-box-header">
  <h3 class="content-box-title">Listar</h3>
  <div class="content-box-btn">
    <a href="{{ route('user.create') }}" class="btn-success">
      <x-heroicon-o-plus-circle class="w-6 h-6" />
    </a>
  </div>
</div>
<x-alert />
<div class="table-container mt-6">
  <table class="table">
      <thead >
        <tr class="table-row-header">
            <th class="table-header">CPF</th>
            <th class="table-header">Nome</th>
            <th class="table-header hidden lg:table-cell">Email</th>
            <th class="table-header center">Ações</th>
        </tr>
      </thead>
      <tbody>
      @forelse ($users as $user)
        <tr class="table-row-body">
          <td class="table-body">{{ $user->cpf }}</td>
          <td class="table-body">{{ $user->name }}</td>
          <td class="table-body hidden lg:table-cell">{{ $user->email }}</td>
          
          <td class="table-body table-actions">  
            <a href="{{ route('user.show', ['user' => $user]) }}" class="btn-primary flex items-center space-x-1">            
              <x-heroicon-o-eye class="w-6 h-6" />
            </a>

            <a href="{{ route('user.edit', ['user' => $user]) }}" class="btn-warning hidden md:flex items-center space-x-1">
              <x-heroicon-o-pencil-square class="w-6 h-6" /> 
            </a>

            <form action="{{ route('user.destroy', ['user' => $user]) }}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn-danger hidden md:flex items-center space-x-1">
                <x-heroicon-o-trash class="w-6 h-6" />
              </button>
            </form>  

          </td>
        </tr>
        @empty
        <div class="alert-danger" role="alert">Nenhum usuário encontrado!</div>
        @endforelse
        
      </tbody>
  </table>
</div>
@endsection