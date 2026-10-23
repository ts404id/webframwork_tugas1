<?php
namespace App\Http\Controllers;
use Illuminate\View\View;
class TeamController
{
    public function index(): View
    {
        return view('team.index', ['team' => config('team')]);
    }
    public function show(string $slug): View
    {
        $team = config('team');
        $member = collect($team['members'])->firstWhere('slug', $slug);
        abort_if($member === null, 404);
        return view('team.show', compact('team', 'member'));
    }
}
