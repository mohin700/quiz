<?php

namespace App\Interfaces;

interface OptionRepositoryInterface
{
    public function getAllOptions();
    public function getOptionById($optionId);
    public function deleteOption($optionId);
    public function createOption(array $optionDetails);
    public function updateOption($optionId, array $newDetails);
}
