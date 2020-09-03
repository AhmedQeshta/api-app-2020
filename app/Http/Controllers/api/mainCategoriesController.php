<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Triads\GeneralTriads;
use Illuminate\Http\Request;

class mainCategoriesController extends Controller
{
    use GeneralTriads;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainCategories = MainCategory::selection()->get();
        return $this->returnData('mainCategories',$mainCategories,'good job , success');
    }
    public function getOneCategory(Request $request){
        $mainCategory = MainCategory::selection()->find($request->id);
        if (!$mainCategory){
           return $this->returnError('404','this category not found , try again later!');
        }
        return $this->returnData('mainCategory',$mainCategory,'good job , success');
//        return response()->json($mainCategory);
    }

    public function changeCategoryStatus(Request $request){
        $mainCategory = MainCategory::where('id',$request->id)->update(['active'=>$request->active]);
        if (!$mainCategory){
            return $this->returnError('404','this category not found , try again later!');
        }
        return $this ->returnSuccessMessage('WoW , update successfully','201');
    }

    public function offers(){

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
