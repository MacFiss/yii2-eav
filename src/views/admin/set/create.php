<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model nullref\eav\models\attribute\Set */

$this->title = Yii::t('eav', 'Create Set');
$this->params['breadcrumbs'][] = ['label' => Yii::t('eav', 'Sets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-create">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
    </div>

    <p>
        <?= Html::a(Yii::t('eav', 'List'), ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
