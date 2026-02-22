<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

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

        $arrivalDate = $request->arrivalDate;
        $leavingDate = $request->leavingDate;


        $isBooked = Booking::where('room_id', $id)
        ->where('arrival_date', '<=', $leavingDate)
        ->where('leaving_date', '>=', $arrivalDate)
        ->exists();

        if ($isBooked)
            {
                return redirect()->back()->with('message', 'Sorry, this room is already booked for the selected dates. Please choose different dates.');    
            }

            else
                {
                    $data->arrival_date = $request->arrivalDate;
                    $data->leaving_date = $request->leavingDate;
                    $data->save();
                    return redirect()->back()->with('message', 'Room booked successfully!');
                }
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|min:11|max:11',
            'message' => 'required|string',
        ]);

        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->save();

        return redirect()->back()->with('message', 'Your message has been sent successfully!');

    }

    public function our_rooms(Request $request)
    {
        $room = Room::all();
        return view('home.our_rooms', compact('room'));
    }

    public function hotel_about(Request $request)
    {
        return view('home.hotel_about');
    }

    
}
