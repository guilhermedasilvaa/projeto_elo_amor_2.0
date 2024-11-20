<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Controllers\BaseController;

class TbUsuario extends Model
{
    protected $table            = 'tb_usuario';
    protected $primaryKey       = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome_usu', 'cep_end_usu', 'end_usu', 'img_usu', 'tel_usu', 'ponto_col', 'email_usu', 'senha_usu'];


    function mtm_doAccess($w_user, $n_pass)
    {

        // Usando o método prepare para evitar SQL injection
        $sql = "SELECT * FROM tb_usuario WHERE email_usu = ? AND senha_usu = ?";

        // Preparar e executar a consulta
        $query =$this->db->query($sql, [$w_user, $n_pass]);

        // Retornar todas as linhas dos resultados
        return $query->getResult(); // Retorna todas as linhas encontradas
    }
}



