<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/2/26
 * Time: 上午 11:27
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use daan_info_web\Repositories\questionRepositories;


class questionController {

    protected $questionRepositories;
    public function __consrtuct(questionRepositories $questionRepositories)
    {
        $this->questionRepositories = $questionRepositories;
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }

    public function create()
    {

    }

    public function edit(Request $request)
    {

    }

    public function index()
    {

    }

} 