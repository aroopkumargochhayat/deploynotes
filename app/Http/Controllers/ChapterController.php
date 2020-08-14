<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $subject='' )
    {
        $chapters = Chapter::select('*','chapters.id AS id')
                        ->join('subjects','subjects.id','=','chapters.subject_id')
                        ->where('chapters.subject_id', $subject)
						->orderBy('chapters.id', 'DESC')
                        ->get();
        return view('backend.chapters.chapter-list',compact('chapters','subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.chapters.chapter-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'chapter_name' => 'required|string|max:191',
            'chapter_code' => 'required|string|max:191',
            'subject_type' => 'required',
            'subject_id' => 'required',
			//'full_mark' => 'required|integer',
            //'pass_mark' => 'required|integer'
        ]);

        $chapter = New Chapter();
        $chapter->chapter_name = $request->chapter_name;
        $chapter->chapter_code = $request->chapter_code;
        $chapter->subject_type = $request->subject_type;
        $chapter->subject_id = $request->subject_id;
        //$subject->full_mark = $request->full_mark;
       // $subject->pass_mark = $request->pass_mark;
        $chapter->save();
        return redirect('chapters/create')->with('success',_lang('Information has been added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_chapter(Request $request)
    {
        $results = Chapter::where('subject_id',$request->subject_id)->orderBy('id', 'DESC')->get();
        $chapters = '';
        $chapters .= '<option value="">Select One</option>';
        foreach($results as $data){
            $chapters .= '<option value="'.$data->id.'">'.$data->chapter_name.'</option>';
        }
        return $chapters;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapter = Chapter::find($id);
        return view('backend.chapters.chapter-edit',compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'chapter_name' => 'required|string|max:191',
            'chapter_code' => 'required|string|max:191',
            'subject_type' => 'required',
            'subject_id' => 'required',
            //'full_mark' => 'required|integer',
            //'pass_mark' => 'required|integer'
        ]);

        $chapter = Chapter::find($id);
        $chapter->chapter_name = $request->chapter_name;
        $chapter->chapter_code = $request->chapter_code;
        $chapter->subject_type = $request->subject_type;
        $chapter->subject_id = $request->subject_id;
		//$subject->full_mark = $request->full_mark;
       // $subject->pass_mark = $request->pass_mark;
        $chapter->save();
        return redirect('chapters')->with('success',_lang('Information has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chapter = Chapter::find($id);
        $chapter->delete();
        return redirect('chapters')->with('success',_lang('Information has been deleted'));
    }
}