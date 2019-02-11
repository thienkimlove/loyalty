<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\VideoRequest as StoreRequest;
use App\Http\Requests\VideoRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class VideoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class VideoCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Video');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/video');
        $this->crud->setEntityNameStrings('video', 'videos');

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
            'name' => 'seo_name',
            'label' => 'SEO title',
        ]);

        /*$this->crud->addColumn([    // WYSIWYG
            'name' => 'url',
            'label' => 'YoutubeURL',
        ]);*/


        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => [1 => 'Active', 0 => 'Inactive']
        ]);



        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Your title here',
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'seo_name',
            'label' => 'SEO Name',
            'type' => 'text'
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'seo_desc',
            'label' => 'SEO Description',
            'type' => 'textarea'
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'desc',
            'label' => 'Description',
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'name' => 'author',
            'label' => 'Author',
        ]);


        $this->crud->addField([    // WYSIWYG
            'name' => 'code',
            'label' => 'YouTube Iframe Code',
        ]);

        /*$this->crud->addField([    // Image
            'name' => 'image',
            'label' => 'Image',
            'type' => 'browse',
        ]);*/

        $this->crud->addField([
            'name' => 'status',
            'label' => 'Status',
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

        $this->crud->entry->user_id = backpack_user()->id;
        $this->crud->entry->save();
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
