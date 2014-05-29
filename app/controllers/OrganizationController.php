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
}
