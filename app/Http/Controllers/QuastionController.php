<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuastionController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'question'=> [
                'required',
                'min:10',
                function ($attribute, $value, $fail) {
                    $lastCharacter = $value[strlen($value) - 1];

                    if ($lastCharacter !== '?') {
                        $fail('Are you sure that is a question? It is missing the question mark in the end.');
                    }
                }
            ],
        ]);

        Question::query()->create($attributes);

        return to_route('dashboard');
    }
}
