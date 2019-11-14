<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Exhibition;
use App\Models\ExibhitionPainting;
use App\Models\Painting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    public function dashboard(){
       $data = Painting::all();
       return view('artist.dashboard')->with('data',$data);
    }

    public function exibhition(){
        $data=Exhibition::all();
        return view('artist.exibhition')->with('data',$data);
    }

    public function addexipaint($exiid,$paintid){
        $id=ExibhitionPainting::create(['exiid'=>$exiid,'paintid'=>$paintid]);
        return redirect()->back();
    }

    public function exidetails($id){
       $data= Exhibition::find($id);
       $alreadyaddedrq=ExibhitionPainting::where(['exiid'=>$id]);
       $ids=$alreadyaddedrq->pluck('id');
       $alreadyadded=$alreadyaddedrq->get();
       $painting=Painting::whereNotIn('id',$ids)->where('user_id',Auth::id())->get();
       return view('artist.exidetails')->with('data',$data)->with('painting',$painting)->with('alreadyadded',$alreadyadded);
    }

    public function exijoined($id){
        ExibhitionPainting::where('paintid',$id)->pluck('id');
    }
}
