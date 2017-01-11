<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Entities\Spa;
use App\Transformers\SpaTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;

class SpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->trasformPaginate(Spa::paginate(),SpaTransformer::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'city' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'province' => 'required',
            'gender' => 'required'
        ]);

        $guest = new Guest();
        $guest->fill($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->transformModel(Spa::find($id),new SpaTransformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEmployees($id)
    {
        //
        return $this->transformModel(Spa::find($id),new SpaTransformer);
        Spa::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
