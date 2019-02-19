<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MemberRequest as StoreRequest;
use App\Http\Requests\MemberRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class MemberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class MemberCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Member');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/member');
        $this->crud->setEntityNameStrings('member', 'members');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name',
        ]);

        $this->crud->addColumn([
            'name' => 'phone',
            'label' => 'Phone',
        ]);

        $this->crud->addColumn([
            'name' => 'point',
            'label' => 'Point',
        ]);

        $this->crud->addColumn([
            'name' => 'gold',
            'label' => 'Gold',
        ]);


        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Status?',
            'type' => 'select_from_array',
            'options' => [1 => 'Active', 0 => 'Inactive']
        ]);


        //FIELDS

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
        ]);

        $this->crud->addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'textarea'
        ]);


        $this->crud->addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select2_from_array',
            'options' => [1 => 'Active', 0 => 'Inactive'],
            'allows_null' => false,
            'default' => 1,
        ]);

        $this->crud->denyAccess('create');

        // add asterisk for fields that are required in MemberRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
