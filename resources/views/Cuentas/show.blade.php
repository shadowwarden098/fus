@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detalles de la Cuenta</h5>
                    <div>
                        <a href="{{ route('cuentas.edit', $cuenta->idCuenta) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('cuentas.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Información de la Cuenta -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Información de la Cuenta</h6>
                            <table class="table table-sm">
                                <tr>
                                    <th width="40%">ID Cuenta:</th>
                                    <td>{{ $cuenta->idCuenta }}</td>
                                </tr>
                                <tr>
                                    <th>Usuario:</th>
                                    <td>{{ $cuenta->usuario->nombre ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $cuenta->usuario->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Estado:</th>
                                    <td>
                                        @if($cuenta->estado == 'activa')
                                            <span class="badge bg-success">Activa</span>
                                        @elseif($cuenta->estado == 'suspendida')
                                            <span class="badge bg-warning">Suspendida</span>
                                        @else
                                            <span class="badge bg-danger">Inactiva</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fecha de Creación:</th>
                                    <td>{{ $cuenta->fechaCreacion ? $cuenta->fechaCreacion->format('d/m/Y H:i') : 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted">Acciones de Cuenta</h6>
                            <div class="d-grid gap-2">
                                @if($cuenta->estado == 'activa')
                                    <form action="{{ route('cuentas.desactivar', $cuenta->idCuenta) }}" method="POST" onsubmit="return confirm('¿Está seguro de desactivar esta cuenta?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-warning w-100">
                                            <i class="fas fa-pause"></i> Desactivar Cuenta
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('cuentas.activar', $cuenta->idCuenta) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-play"></i> Activar Cuenta
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('cuentas.destroy', $cuenta->idCuenta) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta cuenta? Esta acción no se puede deshacer.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100">
                                        <i class="fas fa-trash"></i> Eliminar Cuenta
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Estadísticas de la Cuenta -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-3">Estadísticas</h6>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body text-center">
                                    <h3>{{ $cuenta->progresos->count() }}</h3>
                                    <p class="mb-0">Progresos Registrados</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body text-center">
                                    <h3>{{ $cuenta->usuario->comentarios->count() ?? 0 }}</h3>
                                    <p class="mb-0">Comentarios</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body text-center">
                                    <h3>{{ $cuenta->progresos->where('nivel', '>', 0)->count() }}</h3>
                                    <p class="mb-0">Niveles Completados</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-dark">
                                <div class="card-body text-center">
                                    <h3>{{ $cuenta->progresos->sum('acertijosResueltos') }}</h3>
                                    <p class="mb-0">Acertijos Resueltos</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Lista de Progresos -->
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-3">Historial de Progresos</h6>
                            @if($cuenta->progresos->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Usuario</th>
                                                <th>Nivel</th>
                                                <th>Acertijos Resueltos</th>
                                                <th>Leyendas Desbloqueadas</th>
                                                <th>Última Actualización</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cuenta->progresos as $progreso)
                                                <tr>
                                                    <td>{{ $progreso->idProgreso }}</td>
                                                    <td>{{ $progreso->usuario->nombre ?? 'N/A' }}</td>
                                                    <td>
                                                        <span class="badge bg-primary">Nivel {{ $progreso->nivel }}</span>
                                                    </td>
                                                    <td>{{ $progreso->acertijosResueltos }}</td>
                                                    <td>{{ $progreso->leyendasDesbloqueadas }}</td>
                                                    <td>{{ $progreso->updated_at->format('d/m/Y H:i') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> No hay progresos registrados para esta cuenta.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection