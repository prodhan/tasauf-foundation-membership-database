<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Member;
use App\YearlyCollection;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
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
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'photo'=> 'mimes:jpeg,jpg,png,ico,JPG',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input=$request->all();
        if ($request->hasFile('photo')) {
            $file=$request->file('photo');
            $input['photo']=$this->image_upload($file);
        }
        try {
            $data=Member::create($input);
            $year = array(
                ['member_id'=>$data->id,'year'=>2010],
                ['member_id'=>$data->id,'year'=>2011],
                ['member_id'=>$data->id,'year'=>2012],
                ['member_id'=>$data->id,'year'=>2013],
                ['member_id'=>$data->id,'year'=>2014],
                ['member_id'=>$data->id,'year'=>2015],
                ['member_id'=>$data->id,'year'=>2016],
                ['member_id'=>$data->id,'year'=>2017],
                ['member_id'=>$data->id,'year'=>2018],
                ['member_id'=>$data->id,'year'=>2019],
                ['member_id'=>$data->id,'year'=>2020],
                ['member_id'=>$data->id,'year'=>2021],
                ['member_id'=>$data->id,'year'=>2022],
                ['member_id'=>$data->id,'year'=>2023],
                ['member_id'=>$data->id,'year'=>2024],
                ['member_id'=>$data->id,'year'=>2025],
                );
            YearlyCollection::insert($year);
            $bug=0;
        }
        catch (\Exception $e) {
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
            return redirect('/members')->with('success', 'New Member has been added');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $collections = Collection::where('member_id', $member->id)->get();
        return view('members.show', compact('member', 'collections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validator=Validator::make($request->all(),[
            'photo'=> 'mimes:jpeg,bmp,png,jpg'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input=$request->all();
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $input['photo']=$this->image_upload($file);
            $file_path='uploads'.$member['photo'];
            if($member['photo']!=null and file_exists($file_path)){
                unlink($file_path);
            }
        }
        try {
            $member->update($input);
            $bug=0;
        }
        catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
            return redirect('/members')->with('success', 'Information has been updated!');
        }
        else
        {
            return redirect()->back()->with('error', 'Something went wrong!')->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        YearlyCollection::where('member_id', '=', $member->id)->delete();
        $member->delete();
        return redirect()->back()->with('info', 'Info has been Deleted!');
    }

    public function image_upload($file)
    {
        $fileType=$file->getClientOriginalExtension();
        $fileName=rand(1,1000).date('dmyhis').".".$fileType;
        $file->move('uploads',$fileName);
        return $fileName;
    }
}
