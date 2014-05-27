<?php
class OrganizationController extends BaseController {
    public function index($id) {
        $organization = Organization::findOrFail($id);
        $isAdmin = $organization->isAdmin(Auth::user()->id);

        return View::make('organization.index')
            ->with('model', $organization)
            ->with('isOrganizationAdmin', $isAdmin);
    }

    public function admin($id) {
        $organization = Organization::findOrFail($id);

        return View::make('organization.admin')
            ->with('model', $organization);
    }
}
