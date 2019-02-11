<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CategoryRequest as StoreRequest;
use App\Http\Requests\CategoryRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('category', 'categories');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();
        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name',
        ]);


        $this->crud->addColumn([
            'name' => 'author',
            'label' => 'Author',
        ]);

        $this->crud->addColumn([
            'name' => 'menu_order',
            'label' => 'Menu Order',
        ]);


        $this->crud->addColumn([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'parent_id',
            'entity' => 'parent',
            'attribute' => 'name',
            'model' => "App\Models\Category",
        ]);

        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'boolean',
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
        ]);


        $this->crud->addField([
            'name' => 'desc',
            'label' => 'Description',
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'name' => 'seo_name',
            'label' => 'SEO Name',
        ]);

        $this->crud->addField([
            'name' => 'seo_desc',
            'label' => 'SEO Description',
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'name' => 'author',
            'label' => 'Author',
        ]);

        $this->crud->addField([
            'label' => "Parent",
            'type' => 'select2',
            'name' => 'parent_id', // the db column for the foreign key
            'entity' => 'parent', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Category", // foreign key model

            // optional
            'options' => (function ($query) {
                return $query->orderBy('name', 'ASC')
                    ->where('status', 1)
                    ->get();
            }),
        ]);



        $this->crud->addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select2_from_array',
            'options' => [1 => 'Active', 0 => 'Inactive'],
            'allows_null' => false,
            'default' => 1,
        ]);

        $this->crud->addField([
            'name' => 'menu_order',
            'label' => 'Menu Order',
            'type' => 'number'
        ]);


        // add asterisk for fields that are required in CategoryRequest
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
