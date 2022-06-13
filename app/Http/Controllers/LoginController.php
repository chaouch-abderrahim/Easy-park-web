<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login()
    {
        
        return view('login');
    }
    public function loginsubmit(Request $request)
    {

        if ($request->password == "12345" && $request->nom == "admin") { 
            $data2 = array();
        
        $citiesRe = app('firebase.firestore')->database()->collection('Abonnement');
        $documentss = $citiesRe->documents();
        foreach ($documentss as $document) {
            
            $do = [
                'present' => $document->data()['Duration'], 'Prix' => $document->data()['Prix'], 'Type' => $document->data()['Type']
            ];
            array_push($data2, $do);

            
            $data1 = array();
            $existe = false;
            $citiesRef = app('firebase.firestore')->database()->collection('client');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                
                if ($document->data()['Client']==true) {
                
                 $debut = $document->data()['Abonnement']['Debut'];
                $doc = [
                    'Nom' => $document->data()['Nom'], 'Prenom' => $document->data()['Prenom'], 'Tele' => $document->data()['Tele'],
                    'Adress' => $document->data()['Adress'], 'Email' => $document->data()['Email'], 'Matricule' => $document->data()['Matricule'],
                    'Prix' => $document->data()['Abonnement']['Prix'], 'Fin' => $document->data()['Abonnement']['Fin'],
                    'debut' =>  $debut
                ];
                array_push($data1, $doc);
               
                $existe = true;}
            }
			$data3 = array();
            $existe = false;
            $citiesRef = app('firebase.firestore')->database()->collection('Parking');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                
               
                $doc = [
                 'Nom' => $document->data()['Controleur']['Nom'], 'Prenom' => $document->data()['Controleur']['Prenom'], 'Prenom' => $document->data()['Controleur']['CNI'] ,  'Matricule' => $document->data()['Matricule'], 'date Et Heur' => $document->data()['date Et Heur'],
                    
                    
                ];
                array_push($data3, $doc);
               
                $existe = true;
            }
             $data=[1=>$data1,2=>$data2,3=>$data3];
               
             

        }
      
            if ($existe == true) {
              
               
                return view('inde',compact('data'));
            
            
        }  
    }else {
        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "name ou password incorrect", "error");
</script>
            </body>
            </html>
            
            
             '; 
            return view('login');
        }
        
    }

    public function index()
    {  
     
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
                
                if ($document->data()['Client']==true) {
                
               $debut = $document->data()['Abonnement']['Debut'];
                $doc = [
                    'Nom' => $document->data()['Nom'], 'Prenom' => $document->data()['Prenom'], 'Tele' => $document->data()['Tele'],
                    'Adress' => $document->data()['Adress'], 'Email' => $document->data()['Email'], 'Matricule' => $document->data()['Matricule'],
                    'Prix' => $document->data()['Abonnement']['Prix'], 'Fin' => $document->data()['Abonnement']['Fin'],
                    'debut' =>  $debut
                ];
                array_push($data1, $doc);
               
                $existe = true; }
            }$data3 = array();
            $existe = false;
            $citiesRef = app('firebase.firestore')->database()->collection('Parking');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                
               
                $doc = [
                   'Nom' => $document->data()['Controleur']['Nom'], 'Prenom' => $document->data()['Controleur']['Prenom'], 'Prenom' => $document->data()['Controleur']['CNI']  ,'Matricule' => $document->data()['Matricule'], 'date Et Heur' => $document->data()['date Et Heur'],
                   
                    
                ];
                array_push($data3, $doc);
               
                $existe = true;
            }
             $data=[1=>$data1,2=>$data2,3=>$data3];
               
             

        }
      
            if ($existe == true) {
              
               
                return view('inde',compact('data'));
            
            
        } else {

            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "aucun clients", "error");
</script>
            </body>
            </html>
            
            
             '; 
            return view('inde',compact('data'));
        
    }
}
       
    }
   
 ?>   
