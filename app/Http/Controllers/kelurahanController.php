<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekelurahanRequest;
use App\Http\Requests\UpdatekelurahanRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\kelurahanRepository;
use Illuminate\Http\Request;
use Flash;

class kelurahanController extends AppBaseController
{
    /** @var kelurahanRepository $kelurahanRepository*/
    private $kelurahanRepository;

    public function __construct(kelurahanRepository $kelurahanRepo)
    {
        $this->kelurahanRepository = $kelurahanRepo;
    }

    /**
     * Display a listing of the kelurahan.
     */
    public function index(Request $request)
    {
        $kelurahans = $this->kelurahanRepository->paginate(10);

        return view('kelurahans.index')
            ->with('kelurahans', $kelurahans);
    }

    /**
     * Show the form for creating a new kelurahan.
     */
    public function create()
    {
        return view('kelurahans.create');
    }

    /**
     * Store a newly created kelurahan in storage.
     */
    public function store(CreatekelurahanRequest $request)
    {
        $input = $request->all();

        $kelurahan = $this->kelurahanRepository->create($input);

        Flash::success('Kelurahan saved successfully.');

        return redirect(route('kelurahans.index'));
    }

    /**
     * Display the specified kelurahan.
     */
    public function show($id)
    {
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            Flash::error('Kelurahan not found');

            return redirect(route('kelurahans.index'));
        }

        return view('kelurahans.show')->with('kelurahan', $kelurahan);
    }

    /**
     * Show the form for editing the specified kelurahan.
     */
    public function edit($id)
    {
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            Flash::error('Kelurahan not found');

            return redirect(route('kelurahans.index'));
        }

        return view('kelurahans.edit')->with('kelurahan', $kelurahan);
    }

    /**
     * Update the specified kelurahan in storage.
     */
    public function update($id, UpdatekelurahanRequest $request)
    {
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            Flash::error('Kelurahan not found');

            return redirect(route('kelurahans.index'));
        }

        $kelurahan = $this->kelurahanRepository->update($request->all(), $id);

        Flash::success('Kelurahan updated successfully.');

        return redirect(route('kelurahans.index'));
    }

    /**
     * Remove the specified kelurahan from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            Flash::error('Kelurahan not found');

            return redirect(route('kelurahans.index'));
        }

        $this->kelurahanRepository->delete($id);

        Flash::success('Kelurahan deleted successfully.');

        return redirect(route('kelurahans.index'));
    }
}
