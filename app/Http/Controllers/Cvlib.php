<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Cvlib extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faceandgenderdetection');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        //verifier le fichier (extension et taille)
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:6000',
        ]);
        
        //changer le nom du fichier par l'heure d'upload
        $newimagename = time().'.'.$request->image->extension();
        //recuperer le nom du fichier sans les extensions (enlever.nii et .gz)
        $image_without_extension=pathinfo( $newimagename, PATHINFO_FILENAME);

        // stocker le fichier dans le dossier skinsegup
        $request->image->storeAs('', $newimagename, 'cvlib');
        $operation = $request->radiobox;
        //traitement
        $execution_path = base_path()."/cvlib/cv.py";
        Log::info($execution_path);
        $process = new Process(['python3', $execution_path, $newimagename, $operation]);

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
        $imageName='CvlibOutput/'.$newimagename;
        //renvoyer le fichier a la vue
        return redirect()->to('/face-and-gender-detection')
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
            

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
