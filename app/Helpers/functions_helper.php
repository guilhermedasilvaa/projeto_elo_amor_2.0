<?php

function f_senha($_login, $_senha)
{
    //converter senha asc

    $w_texto = $_login . $_senha;

    $w_len = strlen($w_texto);

    $w_fator = 0;

    for($i = 0; $i < $w_len; $i++)
    {
        $w_fator = $w_fator + ord($w_texto[$i]) * ($i +1);
    }

    $w_fator = intval($w_fator % 11);

    if($w_fator == 0)
    {
        $w_fator = 0;
    }

    $_login = str_pad($_login, 5, "A", STR_PAD_LEFT);

    $_senha = str_pad($_senha, 10, '0');

    $w_psw = '';
    $w_cnt = 0;

    for($i = 1; $i <= 10; $i++)
    {
        $w_sgl = '';

        if(($i % 2)==0)
        {
            $w_sgl =  strval(intval((ord($_login[$w_cnt])*(10 - $i)*$w_fator)%11));

            $w_cnt = $w_cnt + 1;

        }

        $w_sen = strval(intval((ord($_senha[$i -1])*$i * $w_fator)% 11));

        $w_psw = $w_psw. $w_sgl . $w_sen;
    }

    return $w_psw;

}
