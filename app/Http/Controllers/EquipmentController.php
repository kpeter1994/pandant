<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Models\WorkOrder;

class EquipmentController extends Controller
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

        return view('pages.kone.equipment.index',compact('services'));
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
