<?php

namespace App\Http\Controllers;

use App\ControllerHelpers\PortfolioPhotoControllerHelper;
use App\Http\Requests\CreatePortfolioPhotoRequest;
use App\Http\Requests\UpdatePortfolioPhotoRequest;
use App\Models\Photo;
use App\Models\PortfolioPhoto;
use Illuminate\Http\Request;
use Flash;
use Response;

class PortfolioPhotoController extends AppBaseController
{

    private $Helper;

    public function __construct()
    {
        $this->Helper = new PortfolioPhotoControllerHelper();
    }

    /**
     * Display a listing of the PortfolioPhoto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $portfolioPhotos = PortfolioPhoto::orderBy('order', 'asc')->paginate(20);
        $photos = Photo::all()->where('visibility', '!=', 0);

        return view('portfolio_photos.index')
            ->with([
                'portfolioPhotos' => $portfolioPhotos,
                'photos'=>$photos
            ] );
    }




    /**
     * Show the form for creating a new PortfolioPhoto.
     *
     * @return Response
     */
    public function create()
    {
        $photos = Photo::all()->where('visibility', '!=', 0)->sortByDesc('id ');

        return view('portfolio_photos.create')->with([
            'photos' => $photos]);

    }




    /**
     * Store a newly created PortfolioPhoto in storage.
     *
     * @param CreatePortfolioPhotoRequest $request
     *
     * @return Response
     */
    public function store(CreatePortfolioPhotoRequest $request)
    {
        $input = $this->Helper->getCreateInput($request->all());
        $this->Helper->setCreateOrder($input['order']);
        PortfolioPhoto::create($input);

        Flash::success('Фото успешно добавлено в подборку портфолио');

        return redirect(route('portfolioPhotos.index'));
    }



    /**
     * Display the specified PortfolioPhoto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $portfolioPhoto = PortfolioPhoto::find($id);
        $photos = Photo::all()->where('visibility', '!=', 0);


        if (empty($portfolioPhoto)) {
            Flash::error('Фото Портфолио не было найдено!');

            return redirect(route('portfolioPhotos.index'));
        }

        return view('portfolio_photos.show')->with([
            'portfolioPhoto'=> $portfolioPhoto,
            'photos'=>$photos
        ]);
    }



    /**
     * Show the form for editing the specified PortfolioPhoto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $portfolioPhoto = PortfolioPhoto::find($id);
        $photos = Photo::all()->where('visibility', '!=', 0)->sortByDesc('id ');

        return view('portfolio_photos.edit')->with([
            'portfolioPhoto'=> $portfolioPhoto,
            'photos' => $photos]);
    }








    /**
     * Update the specified PortfolioPhoto in storage.
     *
     * @param int $id
     * @param UpdatePortfolioPhotoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePortfolioPhotoRequest $request)
    {
        $portfolioPhoto = PortfolioPhoto::find($id);
        $input = $request->all();
        $old_order = $portfolioPhoto->order;
        $new_order = $input['order'];

        if (empty($portfolioPhoto)) {
            Flash::error('Фото Портфолио не было найдено!');

            return redirect(route('portfolioPhotos.index'));
        }

        $this->Helper->setUpdateOrder($old_order, $new_order);
        $portfolioPhoto->update($input);

        Flash::success('Фото в портфолио было успешно изменено!');

        return redirect(route('portfolioPhotos.index'));
    }






    /**
     * Remove the specified PortfolioPhoto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $portfolioPhoto = PortfolioPhoto::find($id);
        $order = $portfolioPhoto->order;

        if (empty($portfolioPhoto)) {
            Flash::error('Портфолио фото не найдено!');

            return redirect(route('portfolioPhotos.index'));
        }

        $portfolioPhoto->delete();
        $this->Helper->setDeleteOrder($order);

        Flash::success('Фото успешно удалено из портфолио!');

        return redirect(route('portfolioPhotos.index'));
    }
}
