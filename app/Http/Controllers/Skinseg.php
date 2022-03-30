<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//importer le package qui permet d'executer les subprocess
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Log;


class Skinseg extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function treat(Request $request)
    {
        
        //verifier le fichier (extension et taille)
        $request->validate([
            'image' => 'required|mimes:gz|max:2048',
        ]);
        
        //extraction du nom du fichier
        /*$path = $request->file('image')->storeAs(
            '../../skinseg', time() ,'skinsegstorge'
        );*/
        $filename=$request->file('image')->getClientOriginalName();
        //changer le nom du fichier par l'heure d'upload
        $newimagename = time().'.nii.'.$request->image->extension();
        //recuperer le nom du fichier sans les extensions (enlever.nii et .gz)
        $file = pathinfo($newimagename, PATHINFO_FILENAME);
        $image_without_extension=pathinfo( $file, PATHINFO_FILENAME);

        // stocker le fichier dans le dossier skinsegup
        $request->image->storeAs('', $newimagename, 'skinseg');
        
        //traitement
        $execution_path = base_path()."/skinseg/Script/test.py";
        Log::info($execution_path);
        $process = new Process(['python3', $execution_path, $newimagename]);

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
        $imageName='SkinSegOutput/JPEG_Outputs/'.$image_without_extension.'_output.jpg';
        $imagenifti='SkinSegOutput/Nifti_Outputs/'.$image_without_extension.'_output.nii.gz';
        //renvoyer le fichier a la vue
        return redirect()->to('/skin-segmentation')
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName)
            ->with('imagenifti',$imagenifti);
            

    }

   
}
