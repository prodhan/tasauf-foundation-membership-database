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
        $query = Collection::whereBetween('date', [$input['from_date'], $input['to_date']]);
        if($input['member_id']){
            $query->where('member_id', $input['member_id']);
        }
        $collections = $query->get();
        return view('reports.by_date', compact('collections'));

    }
    public function reports_by_year(Request $request)
    {
        $input = $request->all();
        $query = YearlyCollection::whereBetween('year', [$input['from_year'], $input['to_year']]);
        if($input['member_id']){
            $query->where('member_id', $input['member_id']);
        }
        $collections = $query->get();
        return view('reports.by_year', compact('collections'));

    }
    public function reports_by_member(Request $request)
    {
        $input = $request->all();
        $query = Member::whereBetween('membership_date', [$input['from_date'], $input['to_date']]);
        if($input['designation']){
            $query->where('designation', $input['designation']);
        }
        $members = $query->get();
        return view('reports.by_member', compact('members'));

    }
}
