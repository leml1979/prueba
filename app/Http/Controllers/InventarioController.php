<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Precio;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Http;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventario='';
        $inventario= Precio::all();
        return view("inventario.index", compact("inventario"));
    }

    public function api2()
    {
                // URL

        $apiURL = 'https://petroapp-price.petro.gob.ve/price/';
        // POST Data
        $postInput = [
            'coins' => ['BTC'],
        ];
        // Headers
        $headers = [
            'Content-Type'=> 'application/json'
        ];
        $response = Http::withHeaders($headers)->post($apiURL, $postInput);
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        echo $statusCode;  // status code
        dd($responseBody); // body response
    }

    public function api()
    {
                // URL

        $apiURL = 'https://petroapp-price.petro.gob.ve/price/';
        // POST Data
        $postInput = [
            'coins' => 'BTC',
        ];
        // Headers
        $headers = [
            'Content-Type'=> 'application/json'
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $apiURL, ['form_params' => $postInput, 'headers' => $headers]);
     
        $responseBody = json_decode($response->getBody(), true);
      
        echo $statusCode = $response->getStatusCode(); // status code
    
        dd($responseBody); // body response
    }
}
