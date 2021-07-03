<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class NoteController extends Controller
{
    public function show($slug){
        return view("note", [
            "note" => Note::where('_id', '=', $slug)->first()
        ]);
    }

    public function store(Request $request){
        $note = new Note;

        $note->title = $request->title;
        $note->note = $request->note;
        $note->user = $request->user;
        $note->save();
        return redirect("/");
        /* return response()->json(["result" => "ok"], 201); */
    }

    public function showAll($user){
        return view("welcome", [
            "notes" => Note::where("user", "=", $user)
        ]);
    }
}
