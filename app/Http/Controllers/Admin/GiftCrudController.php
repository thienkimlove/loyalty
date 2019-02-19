<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\GiftRequest as StoreRequest;
use App\Http\Requests\GiftRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class VideoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class GiftCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Gift');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/gift');
        $this->crud->setEntityNameStrings('gift', 'gifts');

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
            'name' => 'show_price',
            'label' => 'Show Price',
        ]);

        $this->crud->addColumn([
            'name' => 'gold_price',
            'label' => 'Gold Price'
        ]);

        $this->crud->addColumn([
            'name' => 'image', // The db column name
            'label' => "Image", // Table column heading
            'type' => 'image',
        ]);


        $this->crud->addColumn([
            'name' => 'award_type',
            'label' => 'Award Type',
            'type' => 'select_from_array',
            'options' => ['divide' => 'Sẽ trúng thưởng nếu lượt quay chia hết cho', 'number' => 'Sẽ trúng thưởng nếu lượt quay là số', 'fake' => 'Không thể trúng thưởng']
        ]);

        $this->crud->addColumn([
            'name' => 'param',
            'label' => 'Tham số cho cách tính ở trên',
            'type' => 'number'
        ]);

        $this->crud->addColumn([
            'name' => 'limit_per_day',
            'label' => 'Tổng 1 Ngày',
            'type' => 'number'
        ]);


        $this->crud->addColumn([
            'name' => 'is_active',
            'label' => 'Active?',
            'type' => 'select_from_array',
            'options' => [1 => 'Yes', 0 => 'No']
        ]);





        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Your title here',
        ]);

        $this->crud->addField([
            'name' => 'show_price',
            'label' => 'Show Price',
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
            'name' => 'gold_price',
            'label' => 'Gold Price',
            'type' => 'number'
        ]);

        $this->crud->addField([
            'name' => 'award_type',
            'label' => 'Award Type',
            'type' => 'select_from_array',
            'options' => ['divide' => 'Sẽ trúng thưởng nếu lượt quay chia hết cho', 'number' => 'Sẽ trúng thưởng nếu lượt quay là số', 'fake' => 'Không thể trúng thưởng']
        ]);

        $this->crud->addField([
            'name' => 'param',
            'label' => 'Tham số cho cách tính ở trên',
            'type' => 'number'
        ]);

        $this->crud->addField([
            'name' => 'limit_per_day',
            'label' => 'Tổng 1 Ngày',
            'type' => 'number'
        ]);

        $this->crud->addField([
            'name' => 'is_active',
            'label' => 'Active?',
            'type' => 'select2_from_array',
            'options' => [1 => 'Active', 0 => 'Inactive'],
            'allows_null' => false,
            'default' => 1,
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
