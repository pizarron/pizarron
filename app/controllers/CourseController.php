<?php
class CourseController extends BaseController {
    public function index($id) {
        $course = Course::findOrFail($id);
        $teacher = $course->user()->first();

        return View::make('course.index')
            ->with('model', $course)
            ->with('teacher', $teacher)
            ->with('isTeacher', $teacher->id == Auth::user()->id);
    }

    public function admin($id) {
        $course = Course::findOrFail($id);

        return View::make('course.admin')
            ->with('model', $course);
    }
}
