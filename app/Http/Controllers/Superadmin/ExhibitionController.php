<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exhibition;
use Carbon\Carbon;

class ExhibitionController extends Controller
{

    public function create(){
        $data=Exhibition::all();
        $trasheddata=Exhibition::onlyTrashed()->get();
        return view('superadmin.exhibition.create')->with('data',$data)->with('trasheddata',$trasheddata);
    }

    public function store(Request $request){
        $exibhiname=$request->exibhiname;
        $exibhidesc=$request->exibhidesc;
        $exibhivenue=$request->exibhivenue;
        $exibhidate=$request->exibhidate;
        Exhibition::create(['exibhiname'=>$exibhiname,'exibhidesc'=>$exibhidesc,'exibhivenue'=>$exibhivenue,'exibhidate'=>$exibhidate]);
        return redirect()->back();
    }

    public function destroy($id){
       $date= Exhibition::find($id)->exibhidate;
       $date=Carbon::parse($date);
       $datenow=Carbon::now();
       if ($date < $datenow) {
        Exhibition::destroy($id);
        return redirect()->back();
       }
       return redirect()->back()->with('msg','you cant delete this exibhition');

    }
    public function delete($id){
        $date= Exhibition::find($id)->exibhidate;
        $date=Carbon::parse($date);
        $datenow=Carbon::now();
        if ($date < $datenow) {
            Exhibition::withTrashed()->where('id',$id)->forceDelete();
            return redirect()->back();
           }
           return redirect()->back()->with('msg','you cant delete this exibhition');
    }

    public function restore($id){
        Exhibition::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }

    public function edit($id){
        $data= Exhibition::find($id);
        return view('superadmin.exhibition.edit')->with('data',$data);
    }

    public function update(Request $request){
        // dd($request);
        $aaa= Exhibition::where('id',$request->id)->update($request->except('_token','_method'));
        return redirect('/superadmin/exibhition');
    }

}
