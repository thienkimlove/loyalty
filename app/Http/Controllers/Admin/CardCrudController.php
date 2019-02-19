<?php

namespace App\Http\Controllers\Admin;

use App\Models\Card;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation

use Backpack\CRUD\CrudPanel;
use http\Env\Request;

/**
 * Class MemberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CardCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Card');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/card');
        $this->crud->setEntityNameStrings('card', 'cards');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        $this->crud->addColumn([
            'name' => "code",
            'label' => "Card Number"
        ]);

        $this->crud->addColumn([
            'name' => 'disabled',
            'label' => 'IsDisabled?',
            'type' => 'select_from_array',
            'options' => [1 => 'Yes', 0 => 'No']
        ]);


        $this->crud->addColumn([
            'name' => 'make_card',
            'label' => 'MadeCard?',
            'type' => 'select_from_array',
            'options' => [1 => 'Yes', 0 => 'No']
        ]);

        $this->crud->denyAccess('update');
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('delete');

        //$this->crud->enableExportButtons();

        //$this->crud->addButtonFromModelFunction('top', 'export_and_make_card', 'getExport', 'beginning');

        $this->crud->addButtonFromView('top', 'export', 'export', 'beginning');

        $this->crud->addClause('whereMakeCard', false);

        $this->crud->enableBulkActions();

    }

    public function export(\Illuminate\Http\Request $request)
    {
        $entries = $this->request->input('entries');
        $exportIds = [];

        foreach ($entries as $key => $id) {
            if ($this->crud->model->find($id)) {
                $exportIds[] = $id;
            }
        }

        return Card::exportToExcel($exportIds);
    }

}
