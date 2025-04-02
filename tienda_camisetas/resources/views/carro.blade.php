@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h2 class="text-2xl font-bold">Tu Carrito</h2>

    @if(session('carro') && count(session('carro')) > 0)
        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Producto</th>
                    <th class="border p-2">Precio</th>
                    <th class="border p-2">Cantidad</th>
                    <th class="border p-2">Total</th>
                    <th class="border p-2">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('carro') as $id => $item)
                    <tr>
                        <td class="border p-2">{{ $item['nombre'] }}</td>
                        <td class="border p-2">${{ $item['precio'] }}</td>
                        <td class="border p-2">{{ $item['cantidad'] }}</td>
                        <td class="border p-2">${{ $item['precio'] * $item['cantidad'] }}</td>
                        <td class="border p-2">
                            <form action="{{ route('carro.eliminar', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="mt-4 text-gray-600">Tu carrito está vacío.</p>
    @endif
</div>
@endsection
