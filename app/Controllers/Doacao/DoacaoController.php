<?php

namespace App\Controllers\Doacao;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TbUsuario;

class DoacaoController extends BaseController
{
    public $json_response = array();
    protected $tb_usuario, $p_nomeusu, $p_imgusu;

    public function __construct()
    {
        $this->json_response['success'] = false;
        $this->json_response['close'] = false;
        $this->p_nomeusu = $_SESSION['p_nomeusu'];
        $this->p_imgusu = $_SESSION['p_imgusu'];


    }
    public function index()
    {
        $this->mtc_acao_principal();
    }

    public function mtc_acao_principal()
    {
        $data['P_NOMEUSU'] = $this->p_nomeusu;
        $data['P_IMGUSU'] = $this->p_imgusu;

        $arrDataPage = array(
            'title' => 'Tela Principal',
            'breadcrumb' => 'doacao/breadcrumb/v_breadcrumb_doacao',
            'body_target' => 'doacao/v_principal',
            'controller' => 'mtc_acao_principal',
            'data' => $data
        );

        echo view('v_index', $arrDataPage);
    }

    public function mtc_donation()
    {
        
    }
}
