<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/

namespace App\Models;
    require_once('DBAbstractModel.php');

    class Peticion extends DBAbstractModel {
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia()
    {
    if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $titulo;
    private $descripcion;
    private $realizada;

    public function setTitulo($titulo) {
        $this->titulo= $titulo;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion ;
        }

        public function getTitulo() {
            return $this->titulo;
            }
        public function getDescripcion() {
            return $this->descripcion;
            }

    public function set($user_data=array()) 
        {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO peticiones(titulo, descripcion, realizada , id_ciudadano)
                            VALUES(:titulo, :descripcion , :realizada , :id_ciudadano)";
            $this->parametros['titulo']= $titulo;
            $this->parametros['descripcion']= $descripcion;
            $this->parametros['realizada']= false;
            $this->parametros['id_ciudadano']= $_SESSION['id'];
            $this->get_results_from_query();
            $this->mensaje = 'SH agregado correctamente';
    
        }

        public function get($id='')
        {
            if($id != '') {
                $this->query = "
                SELECT *
                FROM peticion
                WHERE id = :id";
                $this->parametros['id']= $id;
                $this->get_results_from_query();
                }
                if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
                }
                $this->mensaje = 'sh encontrado';
                }
                else {
                $this->mensaje = 'sh no encontrado';
                }
                return $this->rows;
                
        }

        public function edit($user_data=array()) {

            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
                }

                $this->query = "
                UPDATE peticion
                SET titulo=:titulo,
                    descripcion=:descripcion,
                WHERE id = :id
                ";

                $this->parametros['titulo']=$titulo;
                $this->parametros['descripcion']=$descripcion;
                $this->get_results_from_query();
                $this->mensaje = 'sh modificado';
        }


        public function delete($id='')
        {
            $this->query = "DELETE FROM peticion
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'SH eliminado';
        }

        /* Método que obtiene todos los superhéroes */
        public function getAll() {
            $this->query = "SELECT * FROM peticion";
            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'SH encontrados';
            } else {
                $this->mensaje = 'SH no encontrados';
            }
            return $this->rows;
        }
    
}
?>