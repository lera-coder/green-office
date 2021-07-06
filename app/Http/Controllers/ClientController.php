<?php

namespace App\Http\Controllers;

use App\ControllerHelpers\ClientControllerHelper;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Status;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ClientController extends AppBaseController
{
    private $Helper;

    public function __construct()
    {
        $this->Helper = new ClientControllerHelper();

    }

    /**
     * Display a listing of the Client.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clients = Client::orderBy('id', 'desc')->paginate(20);
        $statuses = Status::all();

        return view('clients.index')
            ->with([
                'clients'=> $clients,
                'statuses'=>$statuses
            ] );
    }

    /**
     * Show the form for creating a new Client.
     *
     * @return Response
     */
    public function create()
    {

        return view('clients.create')->with([
            'statuses'=> $this->Helper->getStatuses(),
            'default_status'=>1
    ]);

    }

    /**
     * Store a newly created Client in storage.
     *
     * @param CreateClientRequest $request
     *
     * @return Response
     */
    public function store(CreateClientRequest $request)
    {
        Client::create($request->all());

        Flash::success('Клиент успешно сохранен!');

        return redirect(route('clients.index'));
    }




    /**
     * Display the specified Client.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $client = Client::find($id);
        $statuses = Status::all();

        if (empty($client)) {
            Flash::error('Клиент не найден!');

            return redirect(route('clients.index'));
        }

        return view('clients.show')->with([
            'client'=> $client,
            'statuses' => $statuses
        ]);
    }

    /**
     * Show the form for editing the specified Client.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $client = Client::find($id);

        if (empty($client)) {
            Flash::error('Клиент не найден!');

            return redirect(route('clients.index'));
        }

        return view('clients.edit')->with([
            'client'=> $client,
            'statuses'=> $this->Helper->getStatuses()
            ]);
    }

    /**
     * Update the specified Client in storage.
     *
     * @param int $id
     * @param UpdateClientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientRequest $request)
    {
        $client = Client::find($id);

        if (empty($client)) {
            Flash::error('Клиент не найден!');

            return redirect(route('clients.index'));
        }

        $client->update($request->all());

        Flash::success('Клиент успешно обновлен!');

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified Client from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);

        if (empty($client)) {
            Flash::error('Клиент не найден!');

            return redirect(route('clients.index'));
        }

        $client->delete();

        Flash::success('Клиент успешно удален!');

        return redirect(route('clients.index'));
    }



}
