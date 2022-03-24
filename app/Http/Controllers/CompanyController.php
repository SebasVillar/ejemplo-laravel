<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = new Company();
        $items = $items->get();
        return response([
            'data' => $items,
            'message' => 'Successful'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Company();
        $item->name = $request->name;
        $item->CEO = $request->CEO;
        $item->domain = $request->domain;
        $item->projects = $request->projects;
        $item->save();

        $response = [
            'data' => $item,
            'message' => 'Successful'
        ];
        return response($response);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $item = new Company();
        $item = $item->where('id', $request->id)->first();

        $response = [
            "item" => $item,
            'message' => 'Successful'
        ];
        return response($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = Company::where('id', $request->id)->first();
        $item->name = $request->name;
        $item->CEO = $request->CEO;
        $item->domain = $request->domain;
        $item->projects = $request->projects;
        $item->save();

        $response = [
            'data' => $item,
            'message' => 'Successful'
        ];
        return response($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $item = Company::where('id', $request->id)->first();
        $item->delete();
        $response = [
            'message' => 'Item deleted'
        ];
        return response($response);
    }

    // route model binding
    // revisar https://laravel.com/docs/7.x/routing#route-model-binding
    public function show2(Company $company)
    {
        $resp = [
            "data" => $company
        ];
        return response($resp);
    }

    public function show3(Company $company)
    {
        $resp = [
            "data" => new CompanyResource($company)
        ];
        return response($resp);
    }

    public function store2(Request $request)
    {
        $request->validate([
            'name' => 'required|max:8',
            'CEO' => 'required',
        ]);

        $item = Company::create($request->all());

        $response = [
            "data" => $item,
            "message" => "Successful"
        ];
        return response($response);
    }

    public function store3(CompanyRequest $request)
    {
        $item = Company::create($request->all());

        $response = [
            "data" => $item,
            "message" => "Successful"
        ];
        return response($response);
    }

    public function index2(Request $request)
    {
        $items = new Company();
        // $items = $items->with('employees')->get();
        $items = $items->employees()->get();
        return response([
            'data' => $items,
            'message' => 'Successful'
        ], 200);
    }
}
