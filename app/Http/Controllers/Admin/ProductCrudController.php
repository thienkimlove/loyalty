<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class VideoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Title',
        ]);

        $this->crud->addColumn([
            'name' => 'price',
            'label' => 'Price',
        ]);

        $this->crud->addColumn([
            'name' => 'exchange_gold_price',
            'label' => 'Exchange Price'
        ]);

        $this->crud->addColumn([
            'name' => 'image', // The db column name
            'label' => "Image", // Table column heading
            'type' => 'image',
        ]);


        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Your title here',
        ]);

        $this->crud->addField([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number'
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'desc',
            'label' => 'Description',
            'type' => 'textarea'
        ]);

        $this->crud->addField([    // Image
            'name' => 'image',
            'label' => 'Image',
            'type' => 'browse',
        ]);



        $this->crud->addField([
            'name' => 'exchange_gold_price',
            'label' => 'Gold Exchange Price',
            'type' => 'number'
        ]);


        // add asterisk for fields that are required in VideoRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);

        //$this->crud->entry->user_id = backpack_user()->id;
        //$this->crud->entry->save();
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
