<?php
/**
 * Created by PhpStorm.
 * User: Maslor
 * Date: 07/12/15
 * Time: 21:18
 */

$userPagesQuery="SELECT pagecounter, nome FROM pagina WHERE userid='$userid';";
$userRegsQuery="SELECT typecounter, regcounter, nome FROM registo WHERE userid='$userid';";
$userRegsTypesQuery="SELECT typecnt, nome FROM tipo_registo WHERE userid='$userid';";
$sigma->connect();

$sigma->submitSQLquery($userPagesQuery);
$userPagesResult=$sigma->getResult();
$userRegsResult=$sigma->getResult();
$userRegsTypesResult=$sigma->getResult();