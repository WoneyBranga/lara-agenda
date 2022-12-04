<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $events = [];

        $appointments = Appointment::with(['client', 'employee'])->get();

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->client->name . ' (' . $appointment->employee->name . ') ' . $appointment->comments,
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
                'description' => $appointment->comments,
                // 'display' => 'background',
                'color' => '#ff9f89',

            ];
        }

        return view('home', compact('events'));
    }
}
