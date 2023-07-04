<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepasienAPIRequest;
use App\Http\Requests\API\UpdatepasienAPIRequest;
use App\Models\pasien;
use App\Repositories\pasienRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class pasienAPIController
 */
class pasienAPIController extends AppBaseController
{
    private pasienRepository $pasienRepository;

    public function __construct(pasienRepository $pasienRepo)
    {
        $this->pasienRepository = $pasienRepo;
    }

    /**
     * Display a listing of the pasiens.
     * GET|HEAD /pasiens
     */
    public function index(Request $request): JsonResponse
    {
        $pasiens = $this->pasienRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pasiens->toArray(), 'Pasiens retrieved successfully');
    }

    /**
     * Store a newly created pasien in storage.
     * POST /pasiens
     */
    public function store(CreatepasienAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pasien = $this->pasienRepository->create($input);

        return $this->sendResponse($pasien->toArray(), 'Pasien saved successfully');
    }

    /**
     * Display the specified pasien.
     * GET|HEAD /pasiens/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var pasien $pasien */
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            return $this->sendError('Pasien not found');
        }

        return $this->sendResponse($pasien->toArray(), 'Pasien retrieved successfully');
    }

    /**
     * Update the specified pasien in storage.
     * PUT/PATCH /pasiens/{id}
     */
    public function update($id, UpdatepasienAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var pasien $pasien */
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            return $this->sendError('Pasien not found');
        }

        $pasien = $this->pasienRepository->update($input, $id);

        return $this->sendResponse($pasien->toArray(), 'pasien updated successfully');
    }

    /**
     * Remove the specified pasien from storage.
     * DELETE /pasiens/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var pasien $pasien */
        $pasien = $this->pasienRepository->find($id);

        if (empty($pasien)) {
            return $this->sendError('Pasien not found');
        }

        $pasien->delete();

        return $this->sendSuccess('Pasien deleted successfully');
    }
}
