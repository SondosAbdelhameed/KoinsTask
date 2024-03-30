<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IntervalRequest;
use App\Models\UserBook;
use App\Models\UserBookInterval;

class IntervalController extends Controller
{
    public function setInterval(IntervalRequest $request) {
        $user_book = UserBook::firstOrCreate(['user_id' => $request->user_id, 'book_id' => $request->book_id]);
        $interval = new UserBookInterval();
        $interval->user_book_id = $user_book->id;
        $interval->start_page = $request->start_page;
        $interval->end_page = $request->end_page;
        $interval->save();
        return response()->json(['message' => 'Save user interval successfully']);
    }
}
