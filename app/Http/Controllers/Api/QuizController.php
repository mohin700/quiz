<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizRequest;
use App\Http\Resources\QuizResource;
use App\Interfaces\QuizRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Quiz;

class QuizController extends Controller
{

    private QuizRepositoryInterface $quizRepository;

    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QuizResource::collection($this->quizRepository->getAllQuizzes());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        $quizDetails = $request->validated();
        return new QuizResource($this->quizRepository->createQuiz($quizDetails));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        $quizId = $quiz->id;
        return new QuizResource($this->quizRepository->getQuizById($quizId));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(QuizRequest $request, Quiz $quiz)
    {
        $quizId = $quiz->id;
        $quizDetails = $request->validated();

        return response()->json([
            'data' => $this->quizRepository->updateQuiz($quizId, $quizDetails)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quizId = $quiz->id;
        $this->quizRepository->deleteQuiz($quizId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

}
