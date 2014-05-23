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

    public function edit() {
        $user = User::find(Auth::user()->id);

        return View::make('profile.edit')
            ->with('model', $user);
    }

    public function uploadImage() {
        $extensions = ['png', 'jpeg', 'jpg', 'gif'];
        $maxSize = 1024 * 2000;// 200kb supposedly
        $path = public_path() . "/uploads/";
        $fileName = null;
        $status = null;

        $file = Input::file('profile_url');
        $ext = $file->guessClientExtension();
        $size = $file->getClientSize();
        $name = $file->getClientOriginalName();

        if (in_array($ext, $extensions) and $size < $maxSize) {
            if ($file->move($path, $name)) {
                $fileName = $name;
                $status = 'ok';
            } else {
                $fileName = '';
                $status = 'error';
            }
        } else {
            $fileName = '';
            $status = 'error';
        }

        return [
            'status' => $status,
            'fileName'=> $fileName,
            'path'=>$path
        ];
    }
}
