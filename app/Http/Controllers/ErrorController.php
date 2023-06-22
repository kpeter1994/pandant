<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Error;
use Illuminate\Http\Request;
use App\Models\WorkOrder;

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = WorkOrder::with('workCenter')
            ->where('end', '>=', now()->format('Y-m-d'))
            ->where('status', '<', 5)
            ->get()
            ->sortBy(function ($service) {
                return $service->status;
            });

        $groupedServices = $services->groupBy(function ($service) {
            return date("Y-m-d", strtotime($service->end ));
        })->sortBy(function ($group, $date) {
            return $date;
        });

        $absents =  WorkOrder::with('workCenter')
            ->where('end', '>=', now()->format('Y-m-d'))
            ->where('status', '>', 4)
            ->get()
            ->sortBy(function ($service) {
                return $service->status;
            });
        $groupedAbsents = $absents->groupBy(function ($absent) {
            return date("Y-m-d", strtotime($absent->end ));
        })->sortBy(function ($group, $date) {
            return $date;
        });
        $errors = Error::with('equipment')->orderBy('created_at','DESC')->limit(10)->get();
        return view('pages.kone.error.index', compact('errors', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){

        $equipment = Equipment::find($id);
        return view('pages.kone.error.create', compact('equipment'));
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

        $error = new Error();

    $error->error_id = $request->input('error_id');
	$error->equipment_id = $request->input('equipment_id');
	$error->troubleshooter = $request->input('troubleshooter');
	$error->description = $request->input('description');
	$error->error_type = $request->input('error_type');
	$error->stand = $request->input('stand');
	$error->injured = $request->input('injured');
	$error->recorder = $request->input('recorder');
	$error->whistleblower = $request->input('whistleblower');
	$error->phone = $request->input('phone');
	$error->comment = $request->input('comment');

    $error->save();

    return redirect()->route('error.index')->with('success', 'A hiba rögzítése sikeres');



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
