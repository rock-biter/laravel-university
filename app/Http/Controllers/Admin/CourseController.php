<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Degree;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        if (isset($params['orderBy'])) {

            $column = $params['orderBy'];
            $order = isset($params['order']) ? $params['order'] : 'asc';

            $query = Course::orderBy($column, $order)->limit(50);
        } else {
            $query = Course::limit(50);
        }

        $courses = $query->get();


        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $degrees = Degree::orderBy('name', 'asc')->get();
        $available_cfu = Course::AVAILABLE_CFU;
        // dd($degrees);
        return view('admin.courses.create', compact('degrees', 'available_cfu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'nullable',
            'period' => ['required', Rule::in(['I semestre', 'II semestre', 'Annuale'])],
            'year' => ['required', 'numeric', Rule::in([1, 2, 3, 4, 5, 6])],
            'cfu' => 'required|numeric|min:1|max:50',
            'website' => 'url|nullable',
            'degree_id' => 'required|exists:degrees,id'
        ]);

        $course = Course::create($params);

        return redirect()->route('admin.courses.show', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $attachedTeacherIds = $course->teachers->pluck('id')->all();
        // dd($attachedTeacherIds);
        $teachers = Teacher::whereNotIn('id', $attachedTeacherIds)->orderBy('surname', 'asc')->get();
        return view('admin.courses.show', compact('course', 'teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $params = $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'nullable',
            'period' => ['required', Rule::in(['I semestre', 'II semestre', 'Annuale'])],
            'year' => ['required', 'numeric', Rule::in([1, 2, 3, 4, 5, 6])],
            'cfu' => 'required|numeric|min:1|max:50',
            'website' => 'url|nullable',
            'degree_id' => 'required|exists:degrees,id'
        ]);

        $course->update($params);

        return redirect()->route('admin.courses.show', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index');
    }


    public function attachTeacher(Request $request, Course $course)
    {
        $params = $request->validate([
            'teacher_id' => [
                'nullable',
                'exists:teachers,id',
                Rule::notIn($course->teachers->pluck('id')->all())
            ]
        ]);

        if (array_key_exists('teacher_id', $params)) {
            $course->teachers()->attach($params['teacher_id']);
        }

        return redirect()->route('admin.courses.show', $course);
    }
}
