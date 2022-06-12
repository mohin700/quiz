<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Interfaces\QuestionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Question;

class QuestionController extends Controller
{
    private QuestionRepositoryInterface $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QuestionResource::collection($this->questionRepository->getAllQuestions());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $questionDetails = $request->validated();
        return new QuestionResource($this->questionRepository->createQuestion($questionDetails));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $questionId = $question->id;
        return new QuestionResource($this->questionRepository->getQuestionById($questionId));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $questionId = $question->id;
        $questionDetails = $request->validated();

        return response()->json([
            'data' => $this->questionRepository->updateQuestion($questionId, $questionDetails)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $questionId = $question->id;
        $this->questionRepository->deleteQuestion($questionId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
