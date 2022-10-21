<?php

namespace App\Http\Controllers;

use App\Models\PlateformLogs;

use Illuminate\Http\Request;

class PlateformLogsController extends Controller
{

    public function getPlateformLogs() {
        // Récupérer tous les messages de la Base de données
        // Convertir les objets messages en JSON et les sérialiser
        $logs=plateformlogs::all();
        // Retourner une réponse HTTP contenant nos objets sérialisés
        return $logs->toJson();
    }
}
