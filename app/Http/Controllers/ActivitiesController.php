<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;


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
}
