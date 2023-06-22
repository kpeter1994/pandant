<?php

namespace App\Http\Controllers;

use App\Models\WorkCenter;
use Illuminate\Http\Request;
use App\Models\WorkOrder;

class WorkCenterController extends Controller
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
       return view('pages.kone.work-center.index',compact('services'));
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
     * @param  \App\Models\WorkCenter  $workCenter
     * @return \Illuminate\Http\Response
     */
    public function show(WorkCenter $workCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkCenter  $workCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkCenter $workCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkCenter  $workCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkCenter $workCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkCenter  $workCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkCenter $workCenter)
    {
        //
    }
}
