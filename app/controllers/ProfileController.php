<?php
class ProfileController extends BaseController {
    public function index($id = 0) {
        if ($id == 0) {
            $user = Auth::user();
        } else {
            $user = User::find($id);
        }

        return View::make('profile.index')
            ->with('model', $user);
    }
}
