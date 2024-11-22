<?php

namespace App\Models;

use CodeIgniter\Model;

class TbDoacao extends Model
{
    protected $table            = 'tb_doacao';
    protected $primaryKey       = 'ID_DOACAO';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['DOANOME', 'DOAQNT' , 'DOAEND' , 'DOADTA' , 'DOAFLEX', 'DOAIMG', 'DOADESC', 'ID_USU_DOA' , 'ID_USU_TRANS'];


}

    