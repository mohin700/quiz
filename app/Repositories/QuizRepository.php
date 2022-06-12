<?php

namespace App\Repositories;

use App\Interfaces\QuizRepositoryInterface;
use App\Models\Quiz;

class QuizRepository implements QuizRepositoryInterface
{
    public function getAllQuizzes()
    {
        return Quiz::all();
    }

    public function getQuizById($quizId)
    {
        return Quiz::findOrFail($quizId);
    }

    public function deleteQuiz($quizId)
    {
        Quiz::destroy($quizId);
    }

    public function createQuiz(array $quizDetails)
    {
        return Quiz::create($quizDetails);
    }

    public function updateQuiz($quizId, array $newDetails)
    {
        return Quiz::whereId($quizId)->update($newDetails);
    }

}
