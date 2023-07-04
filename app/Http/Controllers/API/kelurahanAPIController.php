<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekelurahanAPIRequest;
use App\Http\Requests\API\UpdatekelurahanAPIRequest;
use App\Models\kelurahan;
use App\Repositories\kelurahanRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class kelurahanAPIController
 */
class kelurahanAPIController extends AppBaseController
{
    private kelurahanRepository $kelurahanRepository;

    public function __construct(kelurahanRepository $kelurahanRepo)
    {
        $this->kelurahanRepository = $kelurahanRepo;
    }

    /**
     * Display a listing of the kelurahans.
     * GET|HEAD /kelurahans
     */
    public function index(Request $request): JsonResponse
    {
        $kelurahans = $this->kelurahanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kelurahans->toArray(), 'Kelurahans retrieved successfully');
    }

    /**
     * Store a newly created kelurahan in storage.
     * POST /kelurahans
     */
    public function store(CreatekelurahanAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $kelurahan = $this->kelurahanRepository->create($input);

        return $this->sendResponse($kelurahan->toArray(), 'Kelurahan saved successfully');
    }

    /**
     * Display the specified kelurahan.
     * GET|HEAD /kelurahans/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var kelurahan $kelurahan */
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            return $this->sendError('Kelurahan not found');
        }

        return $this->sendResponse($kelurahan->toArray(), 'Kelurahan retrieved successfully');
    }

    /**
     * Update the specified kelurahan in storage.
     * PUT/PATCH /kelurahans/{id}
     */
    public function update($id, UpdatekelurahanAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var kelurahan $kelurahan */
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            return $this->sendError('Kelurahan not found');
        }

        $kelurahan = $this->kelurahanRepository->update($input, $id);

        return $this->sendResponse($kelurahan->toArray(), 'kelurahan updated successfully');
    }

    /**
     * Remove the specified kelurahan from storage.
     * DELETE /kelurahans/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var kelurahan $kelurahan */
        $kelurahan = $this->kelurahanRepository->find($id);

        if (empty($kelurahan)) {
            return $this->sendError('Kelurahan not found');
        }

        $kelurahan->delete();

        return $this->sendSuccess('Kelurahan deleted successfully');
    }
}
