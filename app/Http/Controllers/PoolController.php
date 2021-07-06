<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePoolRequest;
use App\Http\Requests\UpdatePoolRequest;
use App\Models\Pool;
use App\Http\Controllers\AppBaseController;
use App\ControllerHelpers\PoolControllerHelper;
use Illuminate\Http\Request;
use App\Models\Photo;
use Flash;
use Response;

class PoolController extends AppBaseController
{

    private $Helper;


    public function __construct()
    {
        $this->Helper = new PoolControllerHelper();
    }




    /**
     * Display a listing of the Pool.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pools = Pool::orderBy('id', 'desc')->paginate(20);
        $photos = Photo::all()->where('visibility', '!=', 0);



        return view('pools.index')
            ->with([
                'pools' => $pools,
                'photos'=>$photos
           ] );
    }




    /**
     * Show the form for creating a new Pool.
     *
     * @return Response
     */
    public function create()
    {

        return view('pools.create')->with([
            'photos' =>Photo::all()->where('visibility', '!=', 0),
            'categories'=>$this->Helper->getCatogories(),
            ]);
    }




    /**
     * Store a newly created Pool in storage.
     *
     * @param CreatePoolRequest $request
     *
     * @return Response
     */
    public function store(CreatePoolRequest $request)
    {
        $input = $this->Helper->getInput($request->all());

        Pool::create($input);

        Flash::success('Бассейн успешно сохранен!');

        return redirect(route('pools.index'));
    }





    /**
     * Display the specified Pool.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pool = Pool::find($id);

        if (empty($pool)) {
            Flash::error('Бассейн не найден!');
            return redirect(route('pools.index'));
        }

        return view('pools.show')->with([

            'pool' => $pool,
            'main_photo' =>$pool->mainImage,
            'gallery_photos' => $pool->gallery(),
            'slider_photos' => $pool->slider()

            ]
        );
    }





    /**
     * Show the form for editing the specified Pool.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $pool = Pool::find($id);

        if (empty($pool)) {
            Flash::error('Бассейн не найден!');

            return redirect(route('pools.index'));
        }


        return view('pools.edit')->with([
            'pool'=> $pool,
            'main_image' =>$pool->mainImage,
            'gallery_photos' => $pool->gallery(),
            'slider_photos' => $pool->slider(),
            'photos' =>Photo::all()->where('visibility', '!=', 0),
            'categories'=>$this->Helper->getCatogories()

            ]);
    }




    /**
     * Update the specified Pool in storage.
     *
     * @param int $id
     * @param UpdatePoolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePoolRequest $request)
    {
        $pool = Pool::find($id);

        if (empty($pool)) {
            Flash::error('Бассейн не найден!');

            return redirect(route('pools.index'));
        }

        $input = $this->Helper->getInput($request->all());
        $pool->update($input);

        Flash::success('Бассейн успешно обновлен!');

        return redirect(route('pools.index'));
    }




    /**
     * Remove the specified Pool from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pool = Pool::find($id);

        if (empty($pool)) {
            Flash::error('Бассейн не найден!');

            return redirect(route('pools.index'));
        }

        $pool->delete();

        Flash::success('Бассейн успешно удален!');

        return redirect(route('pools.index'));
    }
}
