<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;

/**
 * Class AdminController
 *
 * @package App\Http\Controllers\Admin
 */
class AdminController extends Controller
{
    protected $limit;

    /**
     * Function constructor
     *
     * @param
     * @return mixed
     */
    public function __construct()
    {
        $this->limit = 20;//config('constants.page.per_page');

    }


}
