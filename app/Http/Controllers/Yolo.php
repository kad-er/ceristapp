<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Log;

class Yolo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('objectdetection'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4|max:10240',
        ]);
        $newimagename = time().'.'.$request->image->extension();

        $foo = $request->image->extension();
        $retfile='';
        if (($foo == 'jpeg') || ($foo == 'jpg') || ($foo == 'png') || ($foo == 'gif') || ($foo == 'svg')){
            $retfile='image';
        }else{
            $retfile='video';
        }
        
        // stocker le fichier dans le dossier skinsegup
        $request->image->storeAs('', $newimagename, 'objectdetection');


        //traitement
        $execution_path = base_path()."/ObjectDetection/detect2.py";
        Log::info($execution_path);
        
        $source = '--source='.base_path().'/ObjectDetection/data/images/'.$newimagename;
        $process = new Process(['python3', $execution_path, $source]);

        $process->run();

        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                Log::error($buffer);
                
            } else {
                
                Log::info($buffer);
            }
        });

        echo $process->getOutput();
        //generer le path de sortie
        $imageName='ObjectDetection/'.$newimagename;
        //renvoyer le fichier a la vue
        return redirect()->to('/object-detection')
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName)
            ->with('FileType',$retfile);
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
