<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class GestiondesAbonnementController extends Controller
{
    /*debut Ajouter client  */
    public function add()
    {
        return view('GestionClient/Ajouter_Abonnemnt');
    }


    public function store(Request $request)
    {
        
        
            $existe = false;
            $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                if ($document->data()['Type'] == $request->Type) {
                    $existe = true;
                    break;
                }
            }
           if ($existe == true) {
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "Cette abonnement existe deja", "error");
</script>
            </body>
            </html>
            
            
             '; 
            } else {


               
               
               
                $setRuf = app('firebase.firestore')->database()->collection('Abonnement')->newDocument();
                $setRuf->set([
                    'Duration' =>intval($request->Duration) , 'Prix' =>floatval( $request->Prix), 'Type' => $request->Type
                 ]);
                 echo '
                 <!DOCTYPE html>
                 <html lang="en">
                 <head>
                     
                     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                 </head>
                 <body>
                      <script>
     
     swal("Bien Enregistrer", "voir la liste des abonnements", "success");
     </script>
                 </body>
                 </html>
                 
                 
                  '; 
            }
        
        return view('GestionClient/Ajouter_Abonnemnt');
    }



    public function Lister()
    {
    return view('GestionClient/ListerAbonnement');
    }
    public function list(Request $request)
    {     
        $data = array();
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            
            $doc = [
                'Type' => $document->data()['Type'], 'Prix' => $document->data()['Prix'] , 'Duration' => $document->data()['Duration']
            
            ];
            array_push($data, $doc);

            $existe = true;
        }
  if (isset($_GET['modifier'])) {
    $id = "";
    $existe = false;
    
    $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
    $documents = $citiesRef->documents();
    foreach ($documents as $document) {
        if ($document->data()['Type'] == $request->select) {
            $id = $document->id();
            
            $existe = true;
            break;
        }
    }
    if ($existe == true) {
        
        app('firebase.firestore')->database()->collection('Abonnement')->document($id)->set(
            [
                
                    'Duration' => intval($request->Duration), 'Prix' => floatval($request->Prix), 'Type' => $request->select
            ]
        );
        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Bien Modifié", "Les modifications sont bien enregistrer", "success");
</script>
            </body>
            </html>
            
            
             '; 
        return view('GestionClient/ListerAbonnement', compact('data'));
    } else {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </head>
        <body>
             <script>

swal("Error", "Cette abonnement n existe pas ", "error");
</script>
        </body>
        </html>
        
        
         '; 
        
    }
       
  }
       
         if(isset($_GET['supprimer'])) {
        if ($request->ref !==null) {
                 

            $id = "";
            $existe = false;
            $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                if ($document->data()['Duration'] == $request->ref) {
                   
                    $id = $document->id();
                    
                    $existe = true;
                    break;
                }
            }
            if ($existe == true) {
              //  $auth = app('firebase.auth');
             //   $user = $auth->getUserByEmail($email);
              //  $uid = $user->uid;
               // $auth->deleteUser($uid);
                $citiesRef->document($id)->delete();
                $data = array();
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            
            $doc = [
                'Type' => $document->data()['Type'], 'Prix' => $document->data()['Prix'] , 'Duration' => $document->data()['Duration']
            
            ];
            array_push($data, $doc);

            
        }
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </head>
        <body>
             <script>

swal("Bien Supprimer", "l abonnement est totalement supprimer", "success");
</script>
        </body>
        </html>
        
        
         '; 
                $data = array();
                $existe = false;
                $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
                $documents = $citiesRef->documents();
                foreach ($documents as $document) {
                    
                    $doc = [
                        'Type' => $document->data()['Type'], 'Prix' => $document->data()['Prix'] , 'Duration' => $document->data()['Duration']
                    
                    ];
                    array_push($data, $doc);
        
                    
                }
                return view('GestionClient/ListerAbonnement', compact('data'));

            } else {
                echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "l abonnement n est pas supprimer ", "error");
</script>
            </body>
            </html>
            
            
             '; 
                return view('GestionClient/ListerAbonnement', compact('data'));
            }

        }
        
        }else {
            # code...
        
        if ($existe == true) {
             
            
            return view('GestionClient/ListerAbonnement', compact('data'));
         
        } else {
           
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "aucun abonnements", "error");
</script>
            </body>
            </html>
            
            
             '; 
            return view('GestionClient/ListerAbonnement');
        }
    
    }
        
    }

    public function Update()
    {
	$data = array();
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('client');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            if ( $document->data()['Client']==true) {
            $debut = $document->data()['Abonnement']['Debut'];
            $doc = [
                'Nom' => $document->data()['Nom'], 'Prenom' => $document->data()['Prenom'], 'Tele' => $document->data()['Tele'],
                'Adress' => $document->data()['Adress'], 'Email' => $document->data()['Email'], 'Matricule' => $document->data()['Matricule'],
                'Prix' => $document->data()['Abonnement']['Prix'], 'Fin' => $document->data()['Abonnement']['Fin'],
                'debut' =>  $debut
            ];
            array_push($data, $doc);

            $existe = true;}
        }
       return view('GestionClient/ModifierAbonnement', compact('data'));
    }
    public function Modifier(Request $request)
    {
	 $data = array();
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('client');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            if ( $document->data()['Client']==true) {
            $debut = $document->data()['Abonnement']['Debut'];
            $doc = [
                'Nom' => $document->data()['Nom'], 'Prenom' => $document->data()['Prenom'], 'Tele' => $document->data()['Tele'],
                'Adress' => $document->data()['Adress'], 'Email' => $document->data()['Email'], 'Matricule' => $document->data()['Matricule'],
                'Prix' => $document->data()['Abonnement']['Prix'], 'Fin' => $document->data()['Abonnement']['Fin'],
                'debut' =>  $debut
            ];
            array_push($data, $doc);

            $existe = true;}
        }
        
	if($request->Matricule!= null){
	            $setRuf = app('firebase.firestore')->database()->collection('notifications')->newDocument();
                $setRuf->set([
                    'Matricule' =>$request->Matricule , 'body' =>$request->Message, 'Time' => $request->Email
                 ]);
				  echo '
                 <!DOCTYPE html>
                 <html lang="en">
                 <head>
                     
                     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                 </head>
                 <body>
                      <script>
     
     swal("Bien Envoyer", "Merci pour le message ", "success");
     </script>
                 </body>
                 </html>
                 
                 
                  '; 
       
        }else{
		echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "une ereur est parvenu", "error");
</script>
            </body>
            </html>
            
            
             '; 
		
		}
		return view('GestionClient/ModifierAbonnement', compact('data'));
    }
   }
   