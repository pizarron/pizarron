<?php
class OrganizationController extends BaseController {
    public function index($id) {
        $organization = Organization::findOrFail($id);

        return View::make('organization.index')
            ->with('model', $organization);
    }
}
