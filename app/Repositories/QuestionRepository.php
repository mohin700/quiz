<?php

namespace App\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function getAllQuestions()
    {
        return Question::all();
    }

    public function getQuestionById($questionId)
    {
        return Question::findOrFail($questionId);
    }

    public function deleteQuestion($questionId)
    {
        Question::destroy($questionId);
    }

    public function createQuestion(array $questionDetails)
    {
        return Question::create($questionDetails);
    }

    public function updateQuestion($questionId, array $newDetails)
    {
        return Question::whereId($questionId)->update($newDetails);
    }

}
