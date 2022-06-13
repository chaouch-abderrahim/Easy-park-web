<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthentificationController extends Controller
{
    //
    public function Authentifier(){
        $data2 = array();
        
        $citiesRe = app('firebase.firestore')->database()->collection('Abonnement');
        $documentss = $citiesRe->documents();
        foreach ($documentss as $document) {
            
            
            $do = [
                'Duration' => $document->data()['Duration'], 'Prix' => $document->data()['Prix'], 'Type' => $document->data()['Type']
            ];
            array_push($data2, $do);

            
            $data1 = array();
            $existe = false;
            $citiesRef = app('firebase.firestore')->database()->collection('client');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                $debut = $document->data()['Abonnement']['Debut'];
                if ($document->data()['Client']==true) {
                
               
                $doc = [
                    'Nom' => $document->data()['Nom'], 'Prenom' => $document->data()['Prenom'], 'Tele' => $document->data()['Tele'],
                    'Adress' => $document->data()['Adress'], 'Email' => $document->data()['Email'], 'Matricule' => $document->data()['Matricule'],
                    'Prix' => $document->data()['Abonnement']['Prix'], 'Fin' => $document->data()['Abonnement']['Fin'],
                    'debut' =>  $debut
                ];
                array_push($data1, $doc);
               
                $existe = true; }
            }
            $data3 = array();
            $existe = false;
            $citiesRef = app('firebase.firestore')->database()->collection('Parking');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                
               
                $doc = [
                       'Nom' => $document->data()['Controleur']['Nom'], 'Prenom' => $document->data()['Controleur']['Prenom'], 'CNI' => $document->data()['Controleur']['CNI'], 'Matricule' => $document->data()['Matricule'], 'date Et Heur' => $document->data()['date Et Heur'], 
                
                    
                ];
                array_push($data3, $doc);
               
                $existe = true;
            }
             $data=[1=>$data1,2=>$data2,3=>$data3];
               
             

        }
      
            if ($existe == true) {
               
                return view('inde',compact('data'));
            
            
        }  
}
}