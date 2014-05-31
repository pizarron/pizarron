<?php
class OrganizationController extends BaseController {
    public function index($id) {
        $organization = Organization::findOrFail($id);
        $isAdmin = $organization->isAdmin(Auth::user()->id);

        return View::make('organization.index')
            ->with('model', $organization)
            ->with('isOrganizationAdmin', $isAdmin)
            ->with('teachers', $organization->teachers()->get());
    }

    public function uploadImage($id) {
        $organization = Organization::findOrFail($id);

        $res = $this->uploadImageFile(Input::file('picture_url'));
        if ($res['status'] === 'ok') {
            $organization->picture_url = $res['fileName'];
            $organization->save();
        }

        return [
            'status' => $res['status'],
            'fileName'=> $res['fileName'],
        ];
    }

    public function admin($id) {
        $organization = Organization::findOrFail($id);

        return View::make('organization.admin')
            ->with('model', $organization)
            ->with('admins', $organization->admins()->get())
            ->with('teachers', $organization->teachers()->get());
    }

    public function doEdit($id) {
        $organization = Organization::findOrFail($id);
        $organization->name = Input::get('name');
        $organization->website = Input::get('website');
        $organization->email = Input::get('email');
        $organization->description = Input::get('description');
        $organization->save();

        return Redirect::to("organization/$id/admin")
            ->with('model', $organization)
            ->with('message', 'Successfully updated.');
    }

    public function searchAdmins($id) {
        $q = Input::get('query');
        $organization = Organization::findOrFail($id);
        $ids = $organization->admins()->lists('user_id');
        $data = $this->getUsers($ids, $q);

        return [
            'query'=>$q,
            'suggestions' =>$data
        ];
    }

    public function addAdmin($id) {
        $organization = Organization::findOrFail($id);
        $user = User::find(Input::get('userId'));
        if (!$user) {
            return ['status'=>'error', 'message'=>'User does not exist'];
        }
        $organization->admins()->attach($user->id);

        return [
            'status'=>'ok',
            'message'=>'Admin added successfully',
            'data'=>[
                'id'=>$user->id,
                'name'=>$user->name,
                'email'=>$user->email,
            ]
        ];
    }

    public function removeAdmin($id) {
        $organization = Organization::findOrFail($id);
        $user = User::find(Input::get('userId'));
        if(!$user) {
            return ['status'=>'error', 'message'=>'User does not exist'];
        }
        $organization->admins()->detach($user->id);

        return [
            'status'=>'ok',
            'message'=>'Admin removed successfully',
        ];
    }

    public function searchTeachers($id) {
        $q = Input::get('query');
        $organization = Organization::findOrFail($id);
        $ids = $organization->teachers()->lists('user_id');
        $data = $this->getUsers($ids, $q);

        return [
            'query'=>$q,
            'suggestions' =>$data
        ];
    }

    public function addTeacher($id) {
        $organization = Organization::findOrFail($id);
        $user = User::find(Input::get('userId'));
        if (!$user) {
            return ['status'=>'error', 'message'=>'User does not exist'];
        }
        $organization->teachers()->attach($user->id);

        return [
            'status'=>'ok',
            'message'=>'Teacher added successfully',
            'data'=>[
                'id'=>$user->id,
                'name'=>$user->name,
                'email'=>$user->email,
            ]
        ];
    }

    public function removeTeacher($id) {
        $organization = Organization::findOrFail($id);
        $user = User::find(Input::get('userId'));
        if(!$user) {
            return ['status'=>'error', 'message'=>'User does not exist'];
        }
        $organization->teachers()->detach($user->id);

        return [
            'status'=>'ok',
            'message'=>'Teacher removed successfully',
        ];
    }

    private function getUsers($ids, $q) {
        if (count($ids)>0) {
            $users = User::whereNotIn('id', $ids)->where('name','like', "%$q%")->get();
        } else {
            $users = User::where('name', 'like', "%$q%")->get();
        }

        $result = array();
        foreach ($users as $user) {
            $result[] = [
                'value' => $user->name,
                'data'=>$user->id
            ];
        }
        return $result;
    }
}
