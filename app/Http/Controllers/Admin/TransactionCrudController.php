<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation

use Backpack\CRUD\CrudPanel;

/**
 * Class MemberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TransactionCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Transaction');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transaction');
        $this->crud->setEntityNameStrings('transaction', 'transactions');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        $this->crud->addColumn([
            'label' => "Member", // Table column heading
            'type' => "select",
            'name' => 'member_id', // the column that contains the ID of that connected entity;
            'entity' => 'member', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\Models\Member", // foreign key model
        ]);

        $this->crud->addColumn([
            'name' => "event_id",
            'label' => "Event", // Table column heading
            'type' => "model_function",
            'function_name' => 'getEvent', // the method in your Model
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
            'name' => "created_at", // The db column name
            'label' => "Time", // Table column heading
            'type' => "datetime",
            'format' => 'l j F Y H:i:s', // use something else than the base.default_datetime_format config value
        ]);

        $this->crud->denyAccess('update');
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('delete');
    }

}
