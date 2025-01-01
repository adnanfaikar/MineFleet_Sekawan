<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $vehiclesAvailable = Vehicle::where('status', 'available')->count();
        $vehiclesInUse = Vehicle::where('status', 'in_use')->count();
        $vehiclesUnderRepair = Vehicle::where('status', 'under_repair')->count();

        if ($user->role === 'admin') {
            return view('admin.dashboard', [
                'user' => $user,
                'vehiclesAvailable' => $vehiclesAvailable,
                'vehiclesInUse' => $vehiclesInUse,
                'vehiclesUnderRepair' => $vehiclesUnderRepair,
            ]);
        } elseif ($user->role === 'supervisor') {
            return view('supervisor.dashboard', [
                'user' => $user,
                'vehiclesAvailable' => $vehiclesAvailable,
                'vehiclesInUse' => $vehiclesInUse,
                'vehiclesUnderRepair' => $vehiclesUnderRepair,
            ]);
        }

        abort(403, 'Unauthorized action.');
    }
}
