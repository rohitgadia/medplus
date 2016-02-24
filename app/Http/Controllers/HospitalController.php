<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locality)
    {
        $datas = DB::table('a_chennai_listings')->where('locality',$locality)->get();
        if(!$datas)
            abort(404);
        else
        return view('list',compact('datas','locality'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    public function speciality($locality,$speciality)
    {
        $speciality = explode("_", $speciality);
        $speciality = implode(" ",$speciality);
        $count = DB::table('a_chennai_listings')->count();
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
        $lists = DB::table($locality)->where('speciality',$speciality)->get();
        if(!$lists)
           abort(404);
        else
            return view('speciality',compact('lists','locality','speciality','adjacent'));
    }
    public function commentRequest()
    {
        $comments = file_get_contents('comments.json');
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri == '/comments') {
            return view('react');
        } else if (preg_match('/\/api\/comments(\?.*)?/', $uri)) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $commentsDecoded = json_decode($comments, true);
                $commentsDecoded[] = [
                    'id'      => round(microtime(true) * 1000),
                    'author'  => $_POST['author'],
                    'text'    => $_POST['text']
                ];
                $comments = json_encode($commentsDecoded, JSON_PRETTY_PRINT);
                file_put_contents('comments.json', $comments);
            }
            header('Content-Type: application/json');
            header('Cache-Control: no-cache');
            echo $comments;
        } else {
            return false;
        }
    }
    public function routeRequestPost()
    {
        $uri = $_SERVER['REQUEST_URI'];
        echo $uri;
        if(preg_match('/\api/\comments(\?.*)?/', $uri))
        {
            abort(404);
        }
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
