<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Member;
use App\YearlyCollection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();
        return view('collections.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input=$request->all();

        try {
            $data=Collection::create($input);
            $this->update_yearly_sheet($data->member_id, $data->year, $data->month, $data->amount);
            $bug=0;
        }
        catch (\Exception $e) {
            $bug=$e->getMessage();
        }
        if($bug==0){
            if (isset($input['invoice']))
                return view('reports.invoice', compact('data'));
            else
                return redirect('/members')->with('success', 'New Collection has been added');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Collection $collection
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Collection $collection)
    {
        $this->update_yearly_sheet($collection->member_id, $collection->year, $collection->month, null);
        $collection->delete();
        return redirect()->back()->with('info', 'Info has been Deleted!');
    }

    public function make_new($id){
        $member = Member::findOrFail($id);
        return view('collections.create', compact('member'));
    }

    public function update_yearly_sheet($member_id, $year, $month, $amount){
        $report = YearlyCollection::where('member_id', $member_id)->where('year', '=' ,$year)->first();
        if($month == 1)
            $report->jan = $amount;
        else if($month == 2)
            $report->feb = $amount;
        else if($month == 3)
            $report->march = $amount;
        else if($month == 4)
            $report->april = $amount;
        else if($month == 5)
            $report->may = $amount;
        else if($month == 6)
            $report->jun = $amount;
        else if($month == 7)
            $report->july = $amount;
        else if($month == 8)
            $report->aug = $amount;
        else if($month == 9)
            $report->sept = $amount;
        else if($month == 10)
            $report->oct = $amount;
        else if($month == 11)
            $report->nov = $amount;
        else if($month == 12)
            $report->dec = $amount;

        $report->save();
    }
}
