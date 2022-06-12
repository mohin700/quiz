<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Http\Resources\OptionResource;
use App\Interfaces\OptionRepositoryInterface;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OptionController extends Controller
{

    private OptionRepositoryInterface $optionRepository;

    public function __construct(OptionRepositoryInterface $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OptionResource::collection($this->optionRepository->getAllOptions());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $request)
    {
        $optionDetails = $request->validated();
        return new OptionResource($this->optionRepository->createOption($optionDetails));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        $optionnId = $option->id;
        return new OptionResource($this->optionRepository->getOptionById($optionnId));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $request, Option $option)
    {
        $optionId = $option->id;
        $optionDetails = $request->validated();

        return response()->json([
            'data' => $this->optionRepository->updateOption($optionId, $optionDetails)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $optionId = $option->id;
        $this->optionRepository->deleteOption($optionId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
