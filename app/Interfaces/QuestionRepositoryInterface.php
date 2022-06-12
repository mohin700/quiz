<?php

namespace App\Interfaces;

interface QuestionRepositoryInterface
{
    public function getAllQuestions();
    public function getQuestionById($questionId);
    public function deleteQuestion($questionId);
    public function createQuestion(array $questionDetails);
    public function updateQuestion($questionId, array $newDetails);
}
