<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\inward;
use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiTeamController extends Controller
{
    public function fetchTeamSearchData()
    {
        $team = inward::fetchTeamSearchData();
        return DataTables::of($team)->make(true);
    }
    public function getMaxTeamId()
    {
        $id = Team::max('id') + 1;
        return response()->json(['id' => $id]);
    }
    public function saveTeam(Request $request)
    {
        if ($request->voucher_type == 'edit' && $request->has('id')) {
            $team = Team::find($request->id);
            if ($team) {
                $this->inputTeamField($team, $request);
                $team->save();
                return response()->json(['success' => true, 'message' => 'Team image updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Team image not found'], 404);
            }
        } else {
            $team = new Team();
            $this->inputTeamField($team, $request);
            $team->save();
            return response()->json(['success' => true, 'message' => 'Team image saved successfully']);
        }
    }

    private function inputTeamField($team, Request $request)
    {
        $team->voucher_type = $request->voucher_type;
        $team->current_date = $request->current_date;
        $team->team_role = $request->team_role;
        $team->team_name = $request->team_name;
        $team->status = $request->status ?? 0;
        if ($request->hasFile('team_image')) {
            $file = $request->file('team_image');
            $imageType = $file->getClientOriginalExtension();
            $imageData = 'data:image/' . $imageType . ';base64,' . base64_encode(file_get_contents($file));
            $team->team_image = $imageData;
        }
    }
    public function updateTeamStatus(Request $request, $id)
    {
        $team = Team::find($id);
        if ($team) {
            $team->status = $request->status;
            $team->save();
            return response()->json(['success' => true, 'message' => 'Team status updated successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Team not found']);
    }
    public function fetchTeam($id)
    {
        $team = Team::find($id);

        if ($team && $team->team_image) {
            $team->base64_image = $team->team_image;
        }

        return response()->json(['success' => true, 'data' => $team]);
    }
    public function deleteTeam($id)
    {
        $team = Team::find($id);
        if ($team) {
            $team->delete();
            return response()->json(['success' => true, 'message' => 'Gallery image deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gallery image not found'], 404);
        }
    }
}