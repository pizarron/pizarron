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

    public function doEdit($id) {
        $course = Course::findOrFail($id);
        $course->title = Input::get('title');
        $course->description = Input::get('description');
        $course->about_course = Input::get('about_course');
        $course->lectures = Input::get('lectures');
        $course->language = 'English';
        $course->save();

        return Redirect::to("course/$id/admin")
            ->with('model', $course)
            ->with('message', 'Course updated successfully.');
    }

    public function uploadImage($id) {
        $course = Course::findOrFail($id);
        $res = $this->uploadImageFile(Input::file('picture_url'));
        if ($res['status'] == 'ok') {
            $course->picture_url = $res['fileName'];
            $course->save();
        }

        return [
            'status' => $res['status'],
            'fileName'=> $res['fileName'],
        ];
    }
}
