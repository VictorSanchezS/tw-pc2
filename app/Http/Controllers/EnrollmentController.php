<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Student;

class EnrollmentController extends Controller
{
    /**
     * Instantiate a new enrollmentController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-enrollment|edit-enrollment|delete-enrollment', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-enrollment', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-enrollment', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-enrollment', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('enrollments.index', [
            'enrollments' => enrollment::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('enrollments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request): RedirectResponse
    {
        Enrollment::create($request->all());
        return redirect()->route('enrollments.index')
            ->withSuccess('New enrollment is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment): View
    {
        return view('enrollments.show', [
            'enrollment' => $enrollment,
            'students' => Student::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment): View
    {
        return view('enrollments.edit', [
            'enrollment' => $enrollment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment): RedirectResponse
    {
        $enrollment->update($request->all());
        return redirect()->back()
            ->withSuccess('Enrollment is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(enrollment $enrollment): RedirectResponse
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')
            ->withSuccess('Enrollment is deleted successfully.');
    }

}
