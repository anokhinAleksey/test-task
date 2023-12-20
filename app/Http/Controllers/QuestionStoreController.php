<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\QuestionServiceInterface;
use App\Http\Requests\QuestionCreateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class QuestionStoreController extends Controller
{
    public function __invoke(QuestionCreateRequest $request, QuestionServiceInterface $service) : RedirectResponse
    {
        $service->store($request->modelData());

        return Redirect::back();
    }
}
