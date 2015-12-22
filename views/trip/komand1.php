<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Direction;


/* @var $this yii\web\View */
/* @var $model app\models\Trip */


$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$today = new \DateTime();
$today = $today->getTimestamp();
$today = date('Y', $today);

?>

<font face="Arial">


    <table border="0" width="836" height="529" cellpadding="0" cellspacing="0">
        <tr>
            <td width="190" height="128" align="left" valign="top"><img src="/images/img.png" width="129" height="161" border="0"></td>
            <td width="630" height="128">
                <table border="0" width="630" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="620" align="center" valign="bottom">
                            <p>Посвідчення про відрядження № <?= Html::encode($model->numbertrip) ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="620" align="center" valign="bottom" style="border-bottom-width:1; border-bottom-color:black; border-bottom-style:solid;">
                            <p>Видано <b><?= Html::encode($model->userdata1->pib) ?></b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="620" align="center" valign="bottom">
                            <p><font size="1">(прізвище, ім'я та по батькові)</font></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="620" align="center" valign="bottom" style="border-bottom-width:1; border-bottom-color:black; border-bottom-style:solid;">
                            <p><b><?= Html::encode($model->userdata1->position) ?> ,  ПрАТ "Інюрполіс"</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="620" align="center" valign="bottom">
                            <p><font size="1">(посада, місце роботи)</font></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="620" align="center" valign="bottom" style="border-bottom-width:1; border-bottom-color:black; border-bottom-style:solid;">
                            <p>Відрядженому до <b>м.&nbsp;<?= Html::encode($model->client1->directions->sity) ?>  </b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="620" align="center" valign="bottom">
                            <p><font size="1">(пункти призначення)</font></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="620" align="center" valign="bottom" style="border-bottom-width:1; border-bottom-color:black; border-bottom-style:solid;">
                            <p><b><?= Html::encode($model->client1->nameclient) ?></b></p>
                        </td>
                    </tr>

                    <tr>
                        <td width="620" align="center" valign="top" height="20">
                            <font size="1">(найменування підприємства, установи, організації) </font>
                        </td>
                    </tr>
                    <tr>
                        <td width="620" align="left" valign="bottom">


                    <?php

                            $datetime1 = new DateTime(date('Y-m-d',$model->date_otpr));
                            $datetime2 = new DateTime(date('Y-m-d',$model->date_pr1));
                            $interval = $datetime1->diff($datetime2);
                            $interval =$interval->format('%R%a');
                            $interval =$interval+1;

                      ?>

                            <p>Термін відрядження  " ______ "   днів</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="620" align="center" valign="bottom" style="border-bottom-width:1; border-bottom-color:black; border-bottom-style:solid;">
                            <p><b><?= Html::encode($model->target) ?></b></p>
                        </td>
                    </tr>

                    <tr>
                        <td width="620" align="center" valign="top" height="20">
                            <p><font size="1">(мета відряждення) </font></p>
                        </td>
                    </tr>

                    <tr>
                        <td width="620" align="left" valign="bottom" >

                            <p>Підстава:  наказ від<b> <?=

                                Yii::$app->formatter->asDate($model->prikaz1->dateprikaz, 'd MMMM yyyy') ?> р.  № <?= $model->prikaz1->nomberprikaz ?> </b></p>
                        </td>
                    </tr>


                    <tr>
                        <td width="620" align="left" valign="bottom" height="30">


                            <p>Дійсне при пред'явленні паспорта серії<b> <?= $model->userdata1->pasport ?> </b></p>
                        </td>
                    </tr>



                </table>
                <p>&nbsp;&nbsp;</p>
            </td>
        </tr>
        <tr>

            <?php
            $model1 = Direction::findOne($model->idotpr);
            ?>


            <td width="836" height="220" colspan="2">
                <table cellpadding="0" cellspacing="0" height="181">
                    <tr>
                        <td width="410" height="50" valign="top">М.П.</td>
                        <td width="410" height="50" valign="top">Керiвник</td>
                    </tr>



                    <tr>
                        <td width="410" height="175">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="399">
                                        <p>Вибув з  _________________________________</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"_____"____________________ <b><?= $today ?> р.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="399">
                                       <p><font size="1">М.П.</font>______________________________________</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399" align="center">
                                        <p><font size="1">(підпис)</font></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399">
                                        <br>




                                        <p>Вибув з  _________________________________</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"_____"____________________ <b><?= $today ?> р.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="399">
                                        <p><font size="1">М.П.</font>______________________________________</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399" align="center">
                                        <p><font size="1">(підпис)</font></p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="410" height="175">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="399">
                                        <p>Прибув до _______________________________</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"_____"____________________ <b><?= $today ?> р.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="399">
                                        <p><font size="1">М.П.</font>______________________________________</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399" align="center">
                                        <p><font size="1">(підпис)</font></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399">
                                        <br>
                                        <p>Прибув до _______________________________</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"_____"____________________ <b><?= $today ?> р.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="399">
                                        <p><font size="1">М.П.</font>______________________________________</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="399" align="center">
                                        <p><font size="1">(підпис)</font></p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


</font>