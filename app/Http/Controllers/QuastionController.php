<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuastionController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'question'=> ['required', 'min:10'],
        ]);

        Question::query()->create($attributes);

        return to_route('dashboard');
    }
}
