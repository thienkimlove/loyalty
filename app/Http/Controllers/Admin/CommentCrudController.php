<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CommentRequest as StoreRequest;
use App\Http\Requests\CommentRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CommentCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Comment');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/comment');
        $this->crud->setEntityNameStrings('comment', 'comments');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        //COLUMNS
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Title',
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'label' => 'Email',
        ]);

        $this->crud->addColumn([
            'label' => 'Post',
            'type' => 'select',
            'name' => 'post_id',
            'entity' => 'post',
            'attribute' => 'name',
            'model' => "App\Models\Post",
        ]);

        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Status',
        ]);

        //FIELDS
        $this->crud->addField([    // TEXT
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email'
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'content',
            'label' => 'Content',
            'type' => 'textarea'
        ]);

        $this->crud->addField([    // SELECT
            'label' => 'Post',
            'type' => 'select2',
            'name' => 'post_id',
            'entity' => 'post',
            'attribute' => 'name',
            'model' => "App\Models\Post",
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'status',
            'label' => 'Status',
            'type' => 'enum'
        ]);


        // add asterisk for fields that are required in CommentRequest
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
