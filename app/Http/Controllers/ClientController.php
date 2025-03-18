<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();

        return Inertia::render('Settings/Client',
        [
            'clients' => $clients,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required']
        ]);

        $client = new Client();
        $client->full_name = $request->full_name;
        $client->contact_number = $request->contact_number;
        $client->address = $request->address;
        $client->save();

        return to_route('client.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'full_name' => ['required']
        ]);

        $client = new Client();
        $client->full_name = $request->full_name;
        $client->contact_number = $request->contact_number;
        $client->address = $request->address;
        $client->update();

        return to_route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return to_route('client.index');
    }
}
