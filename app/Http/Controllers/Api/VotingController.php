<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sport;
use App\Vote;

class VotingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sport $sport)
    {
        $getUserVotedLists = auth()->user()->votes->pluck('sport_id')->toArray();

        $sports = $sport->whereNotIn('id', $getUserVotedLists)->get()->take(1);

        return view('sports.index', compact('sports'));
    }

    /**
     * To vote for a team.
     *
     * @return \Illuminate\Http\Response
     */
    public function vote(Sport $sport)
    {
        $vote = Vote::create([
            'sport_id' => $sport->id,
            'user_id' => auth()->id(),
            'team' => request('team')
        ]);

        if (request()->wantsJson()) {
            return response([], 204);
        }

        return view('sports.index', compact('sports'));
    }
}
