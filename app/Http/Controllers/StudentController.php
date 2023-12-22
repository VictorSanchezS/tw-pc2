<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Enrollment;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Instantiate a new studentController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-student|edit-student|delete-student', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-student', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-student', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-student', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // return view('students.index', [
        //     'students' => Student::latest()->paginate(3)
        // ]);
        
        $query = $request->input('query');

        if ($request->ajax()) {
            $students = empty($query) ? Student::all() : Student::where('id_person', 'like', "%$query%")->get();
            return view('students.index_partial', compact('students'));
        }

        // Si no es una solicitud Ajax, devuelve la vista completa con paginación
        $students = empty($query) ? Student::paginate(10) : Student::where('id_person', 'like', "%$query%")->paginate(10);
        return view('students.index', compact('students', 'query'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(
            'students.create',
            [
                'enrollments' => Enrollment::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        $student = new Student();
        $student->id_person = $request->input('id_person');
        $student->carrier = $request->input('carrier');
        $student->faculty = $request->input('faculty');

        $student->save();

        return redirect()->route('students.index')
            ->withSuccess('New student is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student) //: RedirectResponse
    {
        $student = student::find($student->id);

        $student->id_person = $request->input('id_person');
        $student->carrier = $request->input('carrier');
        $student->faculty = $request->input('faculty');

        $student->save();

        return redirect()->back()
            ->withSuccess('Student is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student): RedirectResponse
    {
        $student->delete();
        return redirect()->route('students.index')
            ->withSuccess('Student is deleted successfully.');
    }
}
