<?php
class CourseController extends BaseController {
    public function index($id) {
        $course = Course::findOrFail($id);

        return View::make('course.index')
            ->with('model', $course);
    }
}
