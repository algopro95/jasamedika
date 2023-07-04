<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepasienRequest;
use App\Http\Requests\UpdatepasienRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\pasienRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\kelurahan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use DB;

class pasienController extends AppBaseController
{
    /** @var pasienRepository $pasienRepository*/
    private $pasienRepository;

    public function __construct(pasienRepository $pasienRepo)
    {
        $this->pasienRepository = $pasienRepo;
    }

    /**
     * Display a listing of the pasien.
     */
    public function index(Request $request)
    {
        $pasiens = $this->pasienRepository->paginate(10);

        return view('pasiens.index')
            ->with('pasiens', $pasiens);
    }

    /**
     * Show the form for creating a new pasien.
     */
    public function create()
    {
        $kelurahan = kelurahan::all();
        return view('pasiens.create')->with('kelurahans', $kelurahan);
    }

    /**
     * Store a newly created pasien in storage.
     */
    public function store(CreatepasienRequest $request)
    {
        $input = $request->all();

        $prefix = date('ym00000');

        $existingRecord = DB::table('pasiens')->count();
        $existingRecord++;
        $id = $prefix . $existingRecord;

        $input['id'] = $id;

        $pasien = $this->pasienRepository->create($input);

        Flash::success('Pasien saved successfully.');

        return redirect(route('pasiens.index'));
    }

    /**
     * Display the specified pasien.
     */
    public function show($id)
    {
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect(route('pasiens.index'));
        }

        return view('pasiens.show')->with('pasien', $pasien);
    }

    /**
     * Show the form for editing the specified pasien.
     */
    public function edit($id)
    {
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect(route('pasiens.index'));
        }
        $kelurahan = kelurahan::all();

        return view('pasiens.edit')->with(['pasien' => $pasien, 'kelurahans' => $kelurahan]);
    }

    /**
     * Update the specified pasien in storage.
     */
    public function update($id, UpdatepasienRequest $request)
    {
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect(route('pasiens.index'));
        }

        $pasien = $this->pasienRepository->update($request->all(), $id);

        Flash::success('Pasien updated successfully.');

        return redirect(route('pasiens.index'));
    }

    /**
     * Remove the specified pasien from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            Flash::error('Pasien not found');

            return redirect(route('pasiens.index'));
        }

        $this->pasienRepository->delete($id);

        Flash::success('Pasien deleted successfully.');

        return redirect(route('pasiens.index'));
    }
}
