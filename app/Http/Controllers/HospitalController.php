<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ChennaiList;
use App\Mongodb;

class HospitalController extends Controller
{
    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locality)
    {
        $datas = ChennaiList::where('locality',$locality)->get();
        if($datas->isEmpty())
            abort(404);
        else
        return view('list',compact('datas','locality'));
    }
    public function create()
    {
        
    }
    public function speciality($locality,$speciality)
    {
        $speciality = explode("_", $speciality);
        $speciality = implode(" ",$speciality);
        $count = ChennaiList::count();
        $adjacent = array();
        for($i=0;$i<$count;$i++)
        {
            $array = array();
            $contains = DB::table('a_chennai_listings')->select('speciality','locality')->where('id',$i+1)->get();
            if($contains)
            {
                $array = explode("|", $contains[0]->speciality);
                    if(in_array($speciality, $array))
                    {
                        $adjacent[] =  $contains[0]->locality;
                    }
            }    
        }
        $datas = ChennaiList::where("locality",$locality)->get();
        if(!$datas->isEmpty())
        {
        $lists = DB::table($locality)->where('speciality',$speciality)->get();
        if(!$lists)
           abort(404);
        else
            return view('speciality',compact('lists','locality','speciality','adjacent'));
        }
        else
            abort(404);
    }
    public function commentRequest($locality,$id)
    {
        $hospital = "comments/".$locality.'/'.$id;
        $comments = Mongodb::where('hospital',$hospital)->get();
        $comments = json_encode($comments,JSON_PRETTY_PRINT);
        $uri = $_SERVER['REQUEST_URI'];
        if(preg_match('/\/api\/comments(\?.*)?/', $uri)) {
            $hospital = explode("api/", $uri);
            $hospital = $hospital[1];
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $comment = new Mongodb;
                $comment->id = round(microtime(true) * 1000);
                $comment->author = $_POST['author'];
                $comment->text = $_POST['text'];
                $comment->hospital = $hospital;
                $comment->save();
                $comments = Mongodb::where('hospital',$hospital)->get();
            }
            header('Content-Type: application/json');
            header('Cache-Control: no-cache');
            echo $comments;
        } else {
            return false;
        }
    }
    public function getHospital($locality,$id)
    {
        $datas = DB::table($locality)->where('id',$id)->get();
        if(!$datas)
            abort(404);
        else
        return view('hospital',compact('locality','id','datas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
