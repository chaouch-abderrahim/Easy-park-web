<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class GestiondesClientController extends Controller
{
    /*debut Ajouter client  */
    public function add()
    {
        return view('GestionClient/Ajouter_Client');
    }


  public function store(Request $request)
    {    
        $data = array();
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            
            $doc = [
                'Duration' => $document->data()['Duration'], 'Prix' => $document->data()['Prix'], 'Type' => $document->data()['Type']
            ];
            array_push($data, $doc);

            $existe = true;

        }
        if ($request->confirmpassword == $request->password) {
            $existe = false;
            $citiesRef = app('firebase.firestore')->database()->collection('client');
            $documents = $citiesRef->documents();
			
            foreach ($documents as $document) {
			if($document->data()['Client']==true){
                if ($document->data()['Matricule'] == $request->Matricule) {
                    $existe = true;
                    break;
                }
            }
			}

            $auth = app('firebase.auth');
            $auth->createUserWithEmailAndPassword($request->email,  $request->password);



            if ($existe == true) {
                echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "Ce Client Existe Deja voir liste des client pour le modifier", "error");
</script>
            </body>
            </html>
            
            
             '; 
            } else {



                $debut = date_create('now');
                $add = "";
                $prix=0;
				$a=0;

                $c = 0;
if (!empty($data)) {
     for ($j = 0; $j < count($data); $j++) {
        $c = -1;


        foreach ($data[$j] as $value) {
            $c++;
            if($c==1){
                $prix=$value;  
            }
            if($c==0){
                $a=$value;
            }
            if ($c==2){
                # code...
                 if ($request->select == $value) {
                    $add = $a."days";
                   
                }
        
            }
       
     
    }
}

}
               
               
                $fin = date_create('now +' . $add);
                $setRuf = app('firebase.firestore')->database()->collection('client')->newDocument();
                $setRuf->set([
                    'Nom' => $request->firstName, 'Prenom' => $request->lastName, 'Tele' => $request->telephone, 'Adress' => $request->address, 'Email' => $request->email, 'Matricule' => $request->Matricule,'Client'=>true , 'Urlimage' => '', 'Abonnement' => ['Prix' => $prix, 'Duration'=>$a, 'Debut' => $debut, 'Fin' => $fin]
                ]);
               echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title> 
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Bien Enregistrer", "client bien Enregistrer verifier la liste des client", "success");
</script>
            </body>
            </html>
            
            
             ';  
        }
            
        } else {
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "Las mot de passe sont pas compatible", "error");
</script>
            </body>
            </html>
            
            
             ';  
        }
        return view('GestionClient/Ajouter_Client', compact('data'));
    }
    /*fin Ajouter client  */


    public function fast()
    {
       
        $data = array();
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            
            $doc = [
                'Duration' => $document->data()['Duration'], 'Prix' => $document->data()['Prix'], 'Type' => $document->data()['Type']
            ];
            array_push($data, $doc);

            $existe = true;

        }
        if ($existe == true) {

            return view('GestionClient/Ajouter_Client', compact('data'));
        } else {

            
            return view('GestionClient/Ajouter_Client');
        }
    }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   


    public function fas()
    {
       
        $dat = array();
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            
            $doc = [
                'Duration' => $document->data()['Duration'], 'Prix' => $document->data()['Prix'], 'Type' => $document->data()['Type']
            ];
            array_push($dat, $doc);

            $existe = true;

        }
        if ($existe == true) {

            return view('GestionClient/Modifierclient', compact('dat'));
        } else {

            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "Aucun client existe", "error");
</script>
            </body>
            </html>
            
            
             '; 
            return view('GestionClient/Modifierclient');
        }
    }


















    
    /*debut Supprimmer client  */
    public function delete()
    {
        return view('GestionClient/SupprimerClient');
    }
    public function Supprimer(Request $request)
    {
        if(isset($_POST['Rechercher'])){
            $data = array();
            $exist = false;
            $citiesRef = app('firebase.firestore')->database()->collection('client');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                if ($document->data()['Matricule'] == $request->Matricule) {
                    $data = [
                        'Nom' => $document->data()['Nom'], 'Prenom' => $document->data()['Prenom'], 'Tele' => $document->data()['Tele'],
                        'Adress' => $document->data()['Adress'], 'Email' => $document->data()['Email'], 'Matricule' => $document->data()['Matricule'],
                        'Prix' => $document->data()['Abonnement']['Prix'],  'debut' => $document->data()['Abonnement']['Debut'], 'Fin' => $document->data()['Abonnement']['Fin']
                    ];
                    $exist = true;
                    break;
                }
            }
            
            if ($exist == true) {
                return view('GestionClient/SupprimerClient', compact('data'));
            } else {
    
                echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                </head>
                <body>
                     <script>
    
    swal("Error", "Ce client ne existe pas voir la liste des client", "error");
    </script>
                </body>
                </html>
                
                
                 '; 
                return view('GestionClient/SupprimerClient');
            }
            
        }
        if(isset($_POST['Supprimer'])){
        $id = "";
        $email = "";
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('client');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            if ($document->data()['Matricule'] == $request->Matricule) {
                $id = $document->id();
                $email = $document->data()['Email'];
                $existe = true;
                break;
            }
        }
        if ($existe == true) {
            $auth = app('firebase.auth');
            $user = $auth->getUserByEmail($email);
            $uid = $user->uid;
            $auth->deleteUser($uid);
            $citiesRef->document($id)->delete();

            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Bien Supprimer", "Ce client bien supprimer la liste des client", "success");
</script>
            </body>
            </html>
            
            
             '; 
        } else {
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", Aucun client ", "error");
</script>
            </body>
            </html>
            
            
             '; 
        }

        return view('GestionClient/SupprimerClient');
    }
    }
    /*fin Supprimmer client  */



    /*debut modifier client  */
    public function Update()
    {
        return view('GestionClient/Modifierclient');
    }
    public function Modifier(Request $request)
    {
        
        $dat = array();
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('Abonnement');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            
            $doc = [
                'Duration' => $document->data()['Duration'], 'Prix' => $document->data()['Prix'], 'Type' => $document->data()['Type']
            ];
            array_push($dat, $doc);

            $exist = true;

        }
       
        
        if ($request->Matricule !== null) {
            $data = array();
            $existe = false;
            $citiesRef = app('firebase.firestore')->database()->collection('client');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                if ($document->data()['Matricule'] == $request->Matricule) {
                    $data = [
                        'Nom' => $document->data()['Nom'], 'Prenom' => $document->data()['Prenom'], 'Tele' => $document->data()['Tele'],
                        'Adress' => $document->data()['Adress'], 'Email' => $document->data()['Email'], 'Matricule' => $document->data()['Matricule'],
                        'Prix' => $document->data()['Abonnement']['Prix'],  'debut' => $document->data()['Abonnement']['Debut'], 'Fin' => $document->data()['Abonnement']['Fin']
                    ];
                    $existe = true;
                    break;
                }
            }
            if ($existe == true) {
                return view('GestionClient/Modifierclient', compact('data','dat'));
            } else {

                echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "aucun client, "error");
</script>
            </body>
            </html>
            
            
             '; 
                return view('GestionClient/Modifierclient');
            }
        } else {

            $id = "";
            $existe = false;
            $email="";$matricule="";$url="";
            $citiesRef = app('firebase.firestore')->database()->collection('client');
            $documents = $citiesRef->documents();
            foreach ($documents as $document) {
                if ($document->data()['Matricule'] == $request->matr) {
                    $id = $document->id();
                    $url=$document->data()['Urlimage'];
                    $email=$document->data()['Email'];
                    $matricule=$document->data()['Matricule'];
                    $exist = true;
                    break;
                }
            }
            if ($exist == true) {
                
                $debut = date_create('now');
                $add = "";
                $prix=0;

                $c = 0;
if (!empty($dat)) {
     for ($j = 0; $j < count($dat); $j++) {
        $c = -1;


        foreach ($dat[$j] as $value) {
            $c++;
            if($c==1){
                $prix=$value;  
            }
            if($c==0){
                $a=$value;
            }
            if ($c==2){
                # code...
                 if ($request->select == $value) {
                    $add = $a." days";
                   
                }
        
            }
       
     
    }
}

}
               
               
                $fin = date_create('now +' . $add);
                app('firebase.firestore')->database()->collection('client')->document($id)->set(
                    [
                        'Nom' => $request->firstName, 'Prenom' => $request->lastName, 'Tele' => $request->tele, 'Adress' => $request->address, 'Email' => $email, 'Matricule' => $matricule, 'Urlimage' => '', 'Abonnement' => ['Prix' => $prix, 'Debut' => $debut, 'Fin' => $fin]
              
                            
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

swal("bien modifier", "les informations sont bien modifiés", "success");
</script>
            </body>
            </html>
            
            
             '; 
            } else {
                echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "Ce client n existe pas", "error");
</script>
            </body>
            </html>
            
            
             '; 
            }

            return view('GestionClient/Modifierclient');
        }
    }
    /*fin modifier client  */


    /*debut chercher client  */
    public function search()
    {
        $data = array();
        $existe = false;
        $citiesRef = app('firebase.firestore')->database()->collection('client');
        $documents = $citiesRef->documents();
        foreach ($documents as $document) {
            if ( $document->data()['Client']==true) {
                # code...
            
           
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
       
        if ($existe == true) {
            return view('GestionClient/ChercherClient', compact('data'));
        } else {

            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "Aucun client pour le moment", "error");
</script>
            </body>
            </html>
            
            
             '; 
            return view('GestionClient/ChercherClient');
        }
    }
    public function Chercher()
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
       
        if ($existe == true) {
            return view('GestionClient/ChercherClient', compact('data'));
        } else {

            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "Aucun client pour le moment", "error");
</script>
            </body>
            </html>
            
            
             '; 
            return view('GestionClient/ChercherClient');
        }
    }


    /*fin chercher client  */

    /*debut lister client  */
    public function Lister()
    {
        return view('GestionClient/ListerClient');
    }
    public function list(Request $request)

    {
        if (isset($_GET['submit'])) {
             if($request->ref != null){

            $auth = app('firebase.auth');
            $user = $auth->getUserByEmail($request->ref);
            $uid = $user->uid;
            $a=$auth->disableUser($uid);

        }
            
        }
        if (isset($_GET['aa'])) {
        if($request->m != null){

            $auth = app('firebase.auth');
            $user = $auth->getUserByEmail($request->ref);
            $uid = $user->uid;
            $a=$auth->enableUser($uid);
        }
    } 
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
        if ($existe == true) {
           
            return view('GestionClient/ListerClient', compact('data'));
        } else {

            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                 <script>

swal("Error", "aucun client ", "error");
</script>
            </body>
            </html>
            
            
             '; 
            return view('GestionClient/ListerClient');
        }
    }
   

}
