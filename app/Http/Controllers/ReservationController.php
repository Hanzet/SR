<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index() {
        $reservation = Reservation::with(['user', 'consultant'])->get();
        return view('reservation.index', compact('reservations'));
    }

    public function create() {
        $users = User::where('rol_id', 3)->whereNull('delete_at')->get();

        $consultans = User::where('rol_id', 2)->whereNull('delete_at')->get();

        return view('reservation.create', compact('users', 'consultans'));
    }
}
