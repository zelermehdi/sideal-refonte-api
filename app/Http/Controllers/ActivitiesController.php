<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\credits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Database\Factories\activitiesFactory;
use Illuminate\Support\Facades\Validator;

class activitiesController extends Controller
{
    public function getActivities()
    {
        // Récupérer tous les messages de la Base de données
        // Convertir les objets messages en JSON et les sérialiser
        $activity = Activities::all();
        // Retourner une réponse HTTP contenant nos objets sérialisés
        return $activity->toJson();
    }

    public function getUnique()
    {
        $unique = Activities::where('type', 1)->get();
        return $unique->toJson();
    }
    public function getAnnuel()
    {
        $unique = Activities::where('type', 0)->get();
        return $unique->toJson();
    }

    public function getPonctuel()
    {
        $unique = Activities::where('type', 2)->get();
        return $unique->toJson();
    }

    public function Store(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            // 'file_title' => 'required',
            'color' => 'required',
            // 'slots'=> 'required',
            'require_approval' => 'required',
            'adult_only' => 'required',
            'kid_only' => 'required',
            'adult_sideal_value' => 'required',
            'adult_out_sideal_value' => 'required',
            'kid_sideal_value' => 'required',
            'kid_out_sideal_value' => 'required',
            'day' => 'required',
            'type' => 'required',
            'starts_at' => 'required',
            'ends_at' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->errors(),

            ]);
        } else {
            Activities::create([
                'title' => $request->title,
                //   'file_title' => $request->file_title,
                'color' => $request->color,
                //   'slots'=> $request->slots,
                'require_approval' => $request->require_approval,
                'adult_only' => $request->adult_only,
                'kid_only' => $request->kid_only,
                'adult_sideal_value' => $request->adult_sideal_value,
                'adult_out_sideal_value' => $request->adult_out_sideal_value,
                'kid_sideal_value' => $request->kid_sideal_value,
                'kid_out_sideal_value' => $request->kid_out_sideal_value,
                'day' => $request->day,
                'type' => $request->type,
                'starts_at' => $request->starts_at,
                'ends_at' => $request->ends_at,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'la creation est un succès'

            ]);
        }
    }
}
