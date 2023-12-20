<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\ProfessorDataReaderInterface;
use App\Contracts\StudentDataReaderInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(
        Request $request,
        StudentDataReaderInterface $studentDataReader,
        ProfessorDataReaderInterface $professorDataReader,
    ) : Response {
        /** @var User $user */
        $user = Auth::user();

        return match (true) {
            $user->hasRole(Role::STUDENT) => $this->viewStudentDashboard($request, $studentDataReader, $user),
            default => $this->viewProfessorDashboard($professorDataReader, $user),
        };
    }

    private function viewStudentDashboard(
        Request $request,
        StudentDataReaderInterface $studentDataReader,
        User $user,
    ) : Response {
        $validated = $request->validate(['course' => 'nullable|uuid']);

        return Inertia::render('Student/Dashboard', [
            'grades'  => fn () => $studentDataReader->readGrades($user->id->toString(), $validated['course'] ?? null),
            'courses' => fn () => $studentDataReader->readCourses($user),
        ]);
    }

    private function viewProfessorDashboard(ProfessorDataReaderInterface $professorDataReader, User $user) : Response
    {
        return Inertia::render('Professor/Dashboard', [
            'questions' => fn () => $professorDataReader->readQuestions($user),
            'courses'   => fn () => $professorDataReader->readCourses($user),
        ]);
    }
}
