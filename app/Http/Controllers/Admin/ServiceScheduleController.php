<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceScheduleRequest;
use App\Http\Requests\UpdateServiceScheduleRequest;
use App\Models\ServiceSchedule;
use Inertia\Inertia;

class ServiceScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = ServiceSchedule::latest()->paginate(10);
        
        return Inertia::render('admin/service-schedules/index', [
            'schedules' => $schedules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('admin/service-schedules/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceScheduleRequest $request)
    {
        $schedule = ServiceSchedule::create($request->validated());

        return redirect()->route('admin.service-schedules.index')
            ->with('success', 'Service schedule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceSchedule $serviceSchedule)
    {
        return Inertia::render('admin/service-schedules/show', [
            'schedule' => $serviceSchedule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceSchedule $serviceSchedule)
    {
        return Inertia::render('admin/service-schedules/edit', [
            'schedule' => $serviceSchedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceScheduleRequest $request, ServiceSchedule $serviceSchedule)
    {
        $serviceSchedule->update($request->validated());

        return redirect()->route('admin.service-schedules.index')
            ->with('success', 'Service schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceSchedule $serviceSchedule)
    {
        $serviceSchedule->delete();

        return redirect()->route('admin.service-schedules.index')
            ->with('success', 'Service schedule deleted successfully.');
    }
}