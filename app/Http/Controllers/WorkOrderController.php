<?php

namespace App\Http\Controllers;

use App\Models\WorkCenter;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
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

        return view('pages.kone.work-order.index', compact('groupedServices','services','groupedAbsents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        return view('pages.kone.work-order.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'worker' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => 'required',
        ]);

        $workCenter = WorkCenter::where('name', $request->input('worker'))->first();

        $workerId = $workCenter->id;


        $workOrder =new WorkOrder();
        $workOrder->worker_id = $workerId;
        $workOrder->start = $request->input('start');
        $workOrder->end = $request->input('end');
        $workOrder->status = $request->input('status');
        $workOrder->save();

        return redirect()->route('work-orders.index')->with('succes','Státusz mentve');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkOrder $workOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workOrder = WorkOrder::find($id);
        $workOrder->delete();
        return redirect()->route('work-orders.index')->with('success', 'A bejegyzés törlése sikeres');
    }
}
