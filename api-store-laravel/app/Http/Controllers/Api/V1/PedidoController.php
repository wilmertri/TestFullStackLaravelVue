<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PedidoCollection;
use App\Http\Resources\PedidoResource;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Inventario;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PedidoCollection(Pedido::with('productos')->orderBy('fecha_entrega')->orderBy('prioridad')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return new PedidoResource($pedido);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }


    public function getPedidoPorFecha(Request $request, $fecha)
    {
        return new PedidoCollection(Pedido::where('fecha_entrega', $fecha)->with('productos')->get());
    }

    public function getAlistamientoPedidos(Request $request, Pedido $pedido)
    {
        $productos = $pedido->productos;
        foreach ($productos as $key => $producto) {
            $cantidad = 0;
            if($producto->inventarios->isNotEmpty())
            {    
                foreach ($producto->inventarios as $key => $inventario) 
                {
                    $cantidad += $inventario->cantidad;    
                }
                
            }
            $abastecer = "No";
            if($producto->pivot->cantidad > $cantidad)
            {
                $abastecer = "Si";
            }
            $data[]=[
                'producto' => $producto,
                'cantidad' => $cantidad,
                'abastecer' => $abastecer
            ];
        }

        return response()->json($data);
    }
}
