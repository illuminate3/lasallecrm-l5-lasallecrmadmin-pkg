<?php
namespace Lasallecrm\Lasallecrmadmin\Http\Controllers;

/**
 *
 * Administration package for the LaSalle Customer Relationship Management package.
 *
 * Based on the Laravel 5 Framework.
 *
 * Copyright (C) 2015  The South LaSalle Trading Corporation
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @package    Administration package for the LaSalle Customer Relationship Management package
 * @link       http://LaSalleCRM.com
 * @copyright  (c) 2015, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */

use Lasallecms\Formhandling\AdminFormhandling\AdminFormBaseController;
use Lasallecrm\Lasallecrmapi\Models\Address;

class AdminCRMAddressesController extends AdminFormBaseController
{

    ///////////////////////////////////////////////////////////////////
    ////////////////     USER DEFINED PROPERTIES      /////////////////
    ///////////////////////////////////////////////////////////////////

    /*
     * @var package name
     */
    protected $packageName = 'lasallecrmadmin';

    /*
     * @var Name of this package
     */
    protected $package_title        = "Customer Management";

    /*
     * Lookup table type, in the plural
     */
    protected $table_type_plural   = "Address Types";

    /*
     * Lookup table type, in the singular
     */
    protected $table_type_singular  = "Address Type";

    /*
     * Lookup table name
     */
    protected $table_name           = "lookup_address_types";

    /*
     * This lookup table's model class namespace
     */
    protected $model_namespace      = "Lasallecrm\Lasallecrmapi\Models";

    /*
     * This lookup table's model class
     */
    protected $model_class          = "Address";

    /*
     * The base URL of this lookup table's resource routes
     */
    protected $resource_route_name   = "crmaddresses";


    protected $model;
    public function __construct(Address $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $records = $this->model->all();

        return view('lasallecrmadmin::' . config('lasallecmsadmin.admin_template_name') . '/addresses/index',
            [
                'records' => $records,
            ]);
    }

    ///////////////////////////////////////////////////////////////////
    ////////////////     DO NOT MODIFY BELOW!         /////////////////
    ///////////////////////////////////////////////////////////////////

    public function __construct(LookupRepository $repository)
    {
        // execute AdminController's construct method first in order to run the middleware
        parent::__construct() ;

        // Inject repository
        $this->repository = $repository;

        // Inject the relevant model into the repository
        $this->repository->injectModelIntoRepository($this->model_namespace."\\".$this->model_class);
    }
}