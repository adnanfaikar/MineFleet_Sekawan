<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleRequest;
use App\Models\Vehicle;

class VehicleRequestController extends Controller
{
    public function create()
    {
        return view('input');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_name' => 'required|string|max:255',
            'driver_name' => 'required|string|max:255',
            'supervisor_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'purpose' => 'required|string',
        ]);

        VehicleRequest::create($validated);

        return redirect()->back()->with('success', 'Request berhasil diajukan.');
    }

    public function indexForSupervisor()
    {
        $requests = VehicleRequest::where('status', 'pending')->get();

        return view('supervisor.request', compact('requests'));
    }



    public function updateStatus(Request $request, $id)
    {
        $requestItem = VehicleRequest::findOrFail($id);
        $requestItem->status = $request->input('status');
        $requestItem->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    public function dashboard()
    {
        $vehiclesAvailable = Vehicle::where('status', 'available')->count();
        $vehiclesInUse = Vehicle::where('status', 'in_use')->count();
        $vehiclesUnderRepair = Vehicle::where('status', 'under_repair')->count();

        $data = [
            'vehiclesAvailable' => $vehiclesAvailable,
            'vehiclesInUse' => $vehiclesInUse,
            'vehiclesUnderRepair' => $vehiclesUnderRepair,
        ];

        return view('dashboard', $data);
    }
}
