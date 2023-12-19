<?php

namespace App\Http\Controllers;

use App\Contracts\GradeServiceInterface;
use App\Http\Requests\GradeUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class GradeStoreController extends Controller
{
    public function __invoke(GradeUpdateRequest $request, GradeServiceInterface $service): RedirectResponse
    {
        $service->store($request->modelData());

        return Redirect::back();
    }
}
