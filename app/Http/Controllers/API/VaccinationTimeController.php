<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vaccination_timeResource;
use App\Vaccination_time;
use Illuminate\Http\Request;
use App\Helpers\responseHelpers;

class VaccinationTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacc_dose_time = Vaccination_timeResource::Collection(Vaccination_time::with('vaccines')->paginate(10));
        $responseBinding = responseHelpers::createResponse(false, 200,null ,$vacc_dose_time);
        return response()->json($responseBinding, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacc_dose_time = Vaccination_time::create($request->all());
        $responseBinding = responseHelpers::createResponse(false, 200,'success!! time and doses has been added to vaccine' ,$vacc_dose_time);
        return response()->json($responseBinding, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaccination_time  $vaccination_time
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacc_dose_time = Vaccination_time::find($id);
        $responseBinding = responseHelpers::createResponse(false, 200,null ,$vacc_dose_time);
        return response()->json($responseBinding, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaccination_time  $vaccination_time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $Vacc_dose_time =  Vaccination_time::find($id);
         $Vacc_dose_time->update($request->all());
         $responseBinding = responseHelpers::createResponse(false, 200,'success!! time and dose update done ' ,null);
         return response()->json($responseBinding, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaccination_time  $vaccination_time
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacc_dose_time = Vaccination_time::find($id);
        $vacc_dose_time->delete();
        $responseBinding = responseHelpers::createResponse(false, 200,'success!! time and dose record deleted' ,null );
        return response()->json($responseBinding, 200);
    }
}