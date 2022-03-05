<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/

namespace App\Controllers;

use App\Models\Superheroe;
class SuperHeroesController extends BaseController {
    private function getSuperheroes(){
        return Superheroe::getInstancia()->getAll();
    }

    private function superpoder($id){
        return Superheroe::getInstancia()->getSuperpoder($id);
    }
    public function getSuperheroeAction($nombre) {
        $superheroe = new Superheroe();
        $data = [];
        $data["superheroes"] = $superheroe->getByNombre($nombre);
        $data["habilidades"] = [];
        array_push($data['habilidades'] ,$this->superpoder($data["superheroes"][0]["id"]));
        $this->renderHTML('..\views\index_view.php', $data);
    }
    public function indexAction() {
        $data = [];
        $data["superheroes"] = $this->getSuperheroes();
        $data["habilidades"] = [];
        for ($i=0; $i <count($data["superheroes"]) ; $i++) {
            array_push($data['habilidades'] ,$this->superpoder($data["superheroes"][$i]["id"]));
        }
        $this->renderHTML('..\views\superheroe_view.php', $data);
    }
    
    public function addSuperHeroeAction() {
        // Mejor instalar componentes de validación de terceros y saneamiento de terceros
        $lprocesaFormulario = false;
        $data = array();
        $data['nombre']=$data['imagen']="";
        $data["evolucion"] = "principiante";
        $data['msgErrorNombre']=$data['msgImagen']="";
        if (!empty($_POST)) {
            $data['nombre']=$_POST['nombre'];
            $data['imagen']=$_POST['imagen'];

            $lprocesaFormulario = true;
            if (empty($_POST['nombre'])) {
                $lprocesaFormulario = false;
                $data['msgErrorNombre']="El nombre no puede estar vacío";
            }

            $lprocesaFormulario = true;
            if (empty($_POST['imagen'])) {
                $lprocesaFormulario = false;
                $data['msgErrorImagen']="La imagen no puede estar vacía";
            }


        }
        if ($lprocesaFormulario) {
            //Funciona con Superheroe::getInstancia();
            //También funciona con new Superheroe;
            // Creado test para ver su funcionamiento.
            $objSuperHeroe = Superheroe::getInstancia();
            $objSuperHeroe->setNombre($data['nombre']);
            $objSuperHeroe->setEvolucion($data['evolucion']);
            $objSuperHeroe->setImagen($data['imagen']);
            $objSuperHeroe->set();
            header('Location:'.DIRBASEURL.'/');
        }
        else {
            $this->renderHTML('..\views\addSuperheroe_view.php',$data) ;
        }
            
    }
    
    /*
    * Borra 
    */
    public function delSuperHeroeAction($request) {
      
            $elementos=explode('/',$request);
            $id = end($elementos);
            $objSuperHeroe = Superheroe::getInstancia();
            $objSuperHeroe->del($id);
            header('Location:'.DIRBASEURL.'/');
            
    }

    /*
    *
    * Edit
    */

    public function EditSuperHeroeAction($request) {
           $elementos=explode('/',$request);
           $id = end($elementos);
           $data = array();
           $objSuperHeroe = Superheroe::getInstancia();
           $datosSH= $objSuperHeroe->get($id);
           if ($datosSH) {
              $lprocesaFormulario = false;
              $data = array();
              $data['nombre']= $datosSH['nombre'];
              $data['velocidad']=$datosSH['velocidad'];
              $data['msgErrorNombre']=$data['msgErrorVelocidad']="";
              if (!empty($_POST)) {
                  $data['nombre']=$_POST['nombre'];
                  $data['velocidad']=$_POST['velocidad'];
           
             $lprocesaFormulario = true;
             if (empty($_POST['nombre'])) {
                 $lprocesaFormulario = false;
                 $data['msgErrorNombre']="El nombre no puede estar vacío";
             }
 
             $lprocesaFormulario = true;
             if (empty($_POST['velocidad'])) {
                 $lprocesaFormulario = false;
                 $data['msgErrorVelocidad']="La velocidad no puede estar vacía";
             }
 
 
         }
         if ($lprocesaFormulario) {
               
             $objSuperHeroe->setNombre($_POST['nombre']);
             $objSuperHeroe->setVelocidad($_POST['velocidad']);
             $objSuperHeroe->edit();
             header('Location:'.DIRBASEURL.'/');
                        
         }
         else {
             $this->renderHTML('..\views\editSuperheroe_view.php',$data) ;
         }
         }


            
        else {
            $this->renderHTML('..\views\error_view.php',array("mensaje"=>"El SuperHéroe no existe"));
        }
            
           
           
    }




}
?>