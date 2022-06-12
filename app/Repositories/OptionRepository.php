<?php

namespace App\Repositories;

use App\Interfaces\OptionRepositoryInterface;
use App\Models\Option;

class OptionRepository implements OptionRepositoryInterface
{
    public function getAllOptions()
    {
        return Option::all();
    }

    public function getOptionById($optionId)
    {
        return Option::findOrFail($optionId);
    }

    public function deleteOption($optionId)
    {
        Option::destroy($optionId);
    }

    public function createOption(array $optionDetails)
    {
        return Option::create($optionDetails);
    }

    public function updateOption($optionId, array $newDetails)
    {
        return Option::whereId($optionId)->update($newDetails);
    }

}
