<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Exhibition;
use App\Models\ExibhitionPainting;
use App\Models\Painting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PaintingController extends Controller
{



    public function create(){
        $data = Painting::all();
        $trasheddata=Painting::onlyTrashed()->get();
        return view('artist.painting.create')->with('data',$data)->with('trasheddata',$trasheddata);
    }

    public function store(Request $request){
        $image= $request->file('painting')->store('/public/painting');
        $userid=Auth::user()->id;
        $name=$request->name;
        $description=$request->description;
        $aa= Painting::create(['user_id'=>$userid,'painting'=>$image,'name'=>$name,'description'=>$description]);
        return redirect('/Artist/dashboard');
    }

    public function destroy($id){
        Painting::destroy($id);
        return redirect()->back();
    }

    public function restore($id){
        Painting::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }

    public function edit($id){
        $data=Painting::find($id);
        return view('artist.painting.edit')->with('data',$data);
    }

    public function update(Request $request){
        $name=$request->name;
        $description=$request->description;
        if($request->hasFile('painting')){
            $painting=$request->file('painting')->store('/public/painting');
            Painting::where('id',$request->id)->update(['painting'=>$painting,'name'=>$name,'description'=>$description]);
        }
        Painting::where('id',$request->id)->update(['name'=>$name,'description'=>$description]);
        return redirect('/Artist/painting');
    }

    public function delete($id){
        Painting::withTrashed()->where('id',$id)->forceDelete();
        return redirect('/Artist/painting');
    }

    public function joined($id){
       $data= ExibhitionPainting::where('paintid',$id)->get();
       return view('artist.painting.exibhitions')->with('data',$data);
    }

    public function addpainting($id){
        $paintingdata=Painting::find($id);
        $exi=ExibhitionPainting::where('paintid',$id)->pluck('exiid');
        $exibhitiondata=Exhibition::whereNotIn('id',$exi)->get();
        return view('artist.painting.addpainting')->with('paintingdata',$paintingdata)->with('exibhitiondata',$exibhitiondata);
    }

    public function exitopaint($paint,$exi){
        ExibhitionPainting::updateOrCreate(['paintid'=>$paint,'exiid'=>$exi]);
        return redirect()->back();
    }
}
