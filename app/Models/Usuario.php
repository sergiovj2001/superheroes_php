<?php
namespace App\Models;
    require_once('DBAbstractModel.php');

    class Usuario extends DBAbstractModel {
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
    private $nombre;
    private $password;
    private $rol;


    public function setnombre($nombre) {
        $this->nombre = $nombre;
        }
        public function setpassword($password) {
        $this->password = $password ;
        }
        public function setrol($rol) {
        $this->rol = $rol ;
        }

        public function getnombre() {
            return $this->nombre;
            }
        public function getpassword() {
            return $this->password;
            }
        public function getrol() {
            return $this->rol;
            }
        
        public function set($user_data=array()) 
        {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO usuarios(nombre, password ,rol)
                            VALUES(:nombre, :password , :rol)";
            $this->parametros['nombre']= $nombre;
            $this->parametros['password']= $password;
            $this->parametros['rol']= $rol;
            $this->execute_single_query();
            $this->mensaje = 'SH agregado correctamente';
    
        }

        public function setEntity() {
            $this->query = "INSERT INTO usuarios(nombre, password,rol)
                            VALUES(:nombre, :password , :rol)";
            // $this->parametros['id']=$id;
            $this->parametros['nombre']= $this->nombre;
            $this->parametros['password']= $this->password;
            $this->parametros['rol']= $this->rol;
            $this->get_results_from_query();
            // $this->execute_single_query();
            $this->mensaje = 'usuario añadido.';
        }

        public function get($id='',$nombre='')
        {
            if($id != '' && $nombre == '') {
                $this->query = "
                SELECT *
                FROM usuarios
                WHERE id = :id
                WHERE nombre = :nombre";
                //Cargamos los parámetros.
                $this->parametros['id']= $id;
                $this->parametros['nombre']= $nombre;
                //Ejecutamos consulta que devuelve registros.
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
                UPDATE usuarios
                SET nombre=:nombre,
                    password=:password,
                    rol=:rol
                WHERE id = :id
                ";

                $this->parametros['id']=$id;
                $this->parametros['nombre']=$nombre;
                $this->parametros['password']=$password;
                $this->parametros['rol']=$rol;

                $this->get_results_from_query();
                $this->mensaje = 'sh modificado';
        }

        public function editEntity() {

                $this->query = "
                UPDATE usuarios
                SET nombre=:nombre,
                    password=:password,
                    rol=:rol
                WHERE id = :id
                ";

                $this->parametros['nombre']=$this->nombre;
                $this->parametros['password']=$this->password;
                $this->parametros['rol']=$this->rol;

                $this->get_results_from_query();
                $this->mensaje = 'sh modificado';
        }

        public function delete($id='')
        {
            $this->query = "DELETE FROM usuarios
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'SH eliminado';
        }

        /* Método que obtiene todos los superhéroes */
        public function getAll() {
            $this->query = "SELECT * FROM usuarios";
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

    // Función para buscar superhéroes por nombre
    public function getBynombre($nombre='') {
        if($nombre != '') {
            $this->query = "SELECT * FROM usuarios WHERE nombre = :nombre";
            // Cargamos los parámetros
            $this->parametros['nombre']=$nombre;

            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
        }
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