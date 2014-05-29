<?php
class OrganizationController extends BaseController {
    public function index($id) {
        $organization = Organization::findOrFail($id);
        $isAdmin = $organization->isAdmin(Auth::user()->id);

        return View::make('organization.index')
            ->with('model', $organization)
            ->with('isOrganizationAdmin', $isAdmin);
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
            ->with('model', $organization);
    }

    public function doEdit($id) {
        $organization = Organization::findOrFail($id);

        // Fill data with post info
        $organization->name = Input::get('name');
        $organization->website = Input::get('website');
        $organization->email = Input::get('email');
        $organization->description = Input::get('description');
        $organization->save();

        return Redirect::to("organization/$id/admin")
            ->with('model', $organization)
            ->with('message', 'Successfully updated.');
    }
}
