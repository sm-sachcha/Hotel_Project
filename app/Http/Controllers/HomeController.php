<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Booking;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request, $id)
    {

    $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|min:11|max:11',
            'arrivalDate' => 'required|date',
            'leavingDate' => 'required|date|after:arrivalDate', 
        ]);

        $data = new Booking();
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->arrival_date = $request->arrivalDate;
        $data->leaving_date = $request->leavingDate;
        $data->save();

        return redirect()->back()->with('success', 'Room booked successfully!');
    }
}
