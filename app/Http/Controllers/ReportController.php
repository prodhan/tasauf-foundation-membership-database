<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Member;
use App\YearlyCollection;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $members = Member::pluck('name', 'id');
        return view('reports.index', compact('members'));
    }

    public function reports_by_date(Request $request)
    {
        $input = $request->all();
        $from_date = $input['from_date'];
        $to_date = $input['to_date'];
        $query = Collection::whereBetween('date', [$from_date, $to_date]);
        if($input['member_id']){
            $query->where('member_id', $input['member_id']);
        }
        $collections = $query->get();
        return view('reports.by_date', compact('collections', 'from_date', 'to_date'));

    }
    public function reports_by_year(Request $request)
    {
        $input = $request->all();
        $from_year = $input['from_year'];
        $to_year = $input['to_year'];
        $query = YearlyCollection::whereBetween('year', [$from_year, $to_year]);
        if($input['member_id'] !=''){
            $query->where('member_id', $input['member_id']);
        }
        $collections = $query->get();
        return view('reports.by_year', compact('collections', 'from_year', 'to_year'));

    }
    public function reports_by_member(Request $request)
    {
        $input = $request->all();
        $from_date = $input['from_date'];
        $to_date = $input['to_date'];
        $query = Member::whereBetween('membership_date', [$from_date, $to_date]);
        if($input['designation']){
            $query->where('designation', $input['designation']);
        }
        $members = $query->get();
        return view('reports.by_member', compact('members', 'from_date', 'to_date'));

    }

    public function member_report_by_month(Request $request){
        $input = $request->all();
        $month = $input['month'];
        $year = $input['year'];
        $query = Member::whereMonth('membership_date', '=', $month)->whereYear('membership_date', '=', $year);
        $members = $query->get();
        return view('reports.by_member', compact('members', 'month', 'year'));
    }

    public function get_all_members(){
        $members = Member::all();
        return view('reports.by_member', compact('members'));
    }
}
