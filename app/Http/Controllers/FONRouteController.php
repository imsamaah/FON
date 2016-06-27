<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class FONRouteController extends Controller
{
	private function OLT()
	{
		$query = DB::table('olt')->get();
		$list = NULL;
		foreach($query as $row)
		{
			$id = $row->id;
			$name = $row->name;
			$list .= "<option value='$id'>$name</option>";
		}
		return $list;
	}
	public function OLTCards(Request $request)
	{
		$query = DB::table('olt_card')->where('olt_id',$request->input('olt_id'))->get();
		$list = NULL;
		foreach($query as $row)
		{
			$id = $row->id;
			$card_number = $row->card_number;
			$list .= "<option value='$id'>$card_number</option>";
		}
		return "<option value='0'>--select card--</option>".$list;
	}	
	public function OLTCardPorts(Request $request)
	{
		$query = DB::table('olt_card_port')->where('olt_card_id',$request->input('olt_card_id'))->get();
		$list = NULL;
		foreach($query as $row)
		{
			$id = $row->id;
			$port = $row->port;
			$list .= "<option value='$id'>$port</option>";
		}
		return "<option value='0'>--select card port--</option>".$list;
	}
    public function createRoute()
    {
    	$olt = $this->OLT();
    	return view('create-route')->with([
    		'olt' => $olt,
    		]);
    }
}
