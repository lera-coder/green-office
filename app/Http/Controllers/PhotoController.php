<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\ControllerHelpers\PhotoControllerHelper;
use App\Models\Photo;
use App\Models\Pool;
use App\Models\PortfolioPhoto;
use Illuminate\Http\Request;
use Flash;

use Response;

class PhotoController extends AppBaseController
{

    private $Helper;


    public function __construct()
    {
        $this->Helper = new PhotoControllerHelper();
    }


    /**
     * Display a listing of the Photo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $photos = Photo::orderBy('id', 'desc')->where('visibility', '!=', 0)->paginate(20);

        return view('photos.index')
            ->with('photos', $photos);
    }



    /**
     * Show the form for creating a new Photo.
     *
     * @return Response
     */
    public function create()
    {
        return view('photos.create');
    }


    /**
     * Store a newly created Photo in storage.
     *
     * @param CreatePhotoRequest $request
     *
     * @return Response
     */
    public function store(CreatePhotoRequest $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        Photo::create($this->Helper->getInput($request));
        Flash::success('Фото успешно сохранено!');
        return redirect(route('photos.index'));



    }

    /**
     * Display the specified Photo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);

        if (empty($photo)) {
            Flash::error('Фото не найдено!');

            return redirect(route('photos.index'));
        }

        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified Photo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $photo = Photo::find($id);

        if (empty($photo)) {
            Flash::error('Фото не найдено!');

            return redirect(route('photos.index'));
        }

        return view('photos.edit')->with('photo', $photo);
    }

    /**
     * Update the specified Photo in storage.
     *
     * @param int $id
     * @param UpdatePhotoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhotoRequest $request)
    {
        $photo = Photo::find($id);

        if (empty($photo)) {
            Flash::error('Фото не найдено!');

            return redirect(route('photos.index'));
        }

        $photo->update($request->all());

        Flash::success('Фото успешно обновлено!');

        return redirect(route('photos.index'));
    }


    /**
     * Remove the specified Photo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);

        $this->Helper->changePhotos($id, $photo);


        if (empty($photo)) {
            Flash::error('Фото не найдено!');

            return redirect(route('photos.index'));
        }


        $photo->delete();

        Flash::success('Фото успешно удалено!');

        return redirect(route('photos.index'));
    }
}
