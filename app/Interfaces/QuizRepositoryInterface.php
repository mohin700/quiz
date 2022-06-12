<?php

namespace App\Interfaces;

interface QuizRepositoryInterface
{
    public function getAllQuizzes();
    public function getQuizById($quizId);
    public function deleteQuiz($quizId);
    public function createQuiz(array $quizDetails);
    public function updateQuiz($quizId, array $newDetails);
}
