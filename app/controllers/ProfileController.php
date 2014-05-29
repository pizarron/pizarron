<?php
class ProfileController extends BaseController {
    public function index($id = 0) {
        $user = $id == 0 ? Auth::user() : User::find($id);

        return View::make('profile.index')
            ->with('model', $user)
            ->with('organizations', $user->organizations()->get());
    }

    public function edit() {
        $user = User::find(Auth::user()->id);

        return View::make('profile.edit')
            ->with('model', $user);
    }

    public function doEdit() {
        $user = Auth::user();
        $user->name = Input::get('name');
        $user->country = Input::get('country');
        $user->bio = Input::get('bio');
        $user->website = Input::get('website');
        $user->save();

        return Redirect::to('profile/edit')
            ->with('message', 'Information successfully updated.');
    }

    public function doEditSecurity() {
        $user = Auth::user();
        $credentials = ['email'=>$user->email, 'password'=>Input::get('current')];
        $rules = $this->getSecurityRules();

        $results = Validator::make(Input::all(), $rules);
        if ($results->fails()) {
            return Redirect::back()
                ->withErrors($results)
                ->with('model', $user);
        }

        if (Auth::validate($credentials)) {
            $user->password = Hash::make(Input::get('new_password'));
            $user->save();

            return Redirect::to('profile/edit')
                ->with('message', 'Password changed successfully.');
        }
        return Redirect::back()
            ->with('error', 'Your current passsword is invalid');
    }

    public function uploadImage() {
        $res = $this->uploadImageFile(Input::file('picture_url'));

        if ($res['status'] === 'ok') {
            $user = Auth::user();
            $user->picture_url = $res['fileName'];
            $user->save();
        }

        return [
            'status' => $res['status'],
            'fileName'=> $res['fileName'],
        ];
    }

    public function profileSearch() {
        $q = Input::get('query');
        // TODO: search by query
        return [
            'query'=>$q,
            'suggestions' =>[
                ['value'=>'andorra1', 'data'=>'ad1'],
                ['value'=>'andorra2', 'data'=>'ad2'],
                ['value'=>'andorra3', 'data'=>'ad3'],
                ['value'=>'andorra4', 'data'=>'ad4'],
                ['value'=>'andorra5', 'data'=>'ad5'],
            ]
        ];
    }

    private function getSecurityRules() {
        return [
            'current'=>'required',
            'new_password' =>'required',
            'confirm' =>'required|same:new_password'
        ];
    }
}
