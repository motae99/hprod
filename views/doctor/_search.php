<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PharmacySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="register-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="col-lg-3">
    <?php echo $form->field($model, 'id') ?>
    </div>
    <div class="col-lg-3">
    <?php echo $form->field($model, 'patientName') ?>
    </div>
    <div class="col-lg-3">
    <?php echo $form->field($model, 'patientPhone') ?>
    </div>
    <div class="col-lg-3">
    <?php 
        $status = ['booked' => 'مبدأي', 'confirmed' => 'مؤكد'];
        echo $form->field($model, 'status')->radioButtonGroup($status, [
            'class' => 'btn-group-sm',
            'itemOptions' => ['labelOptions' => ['class' => 'btn btn-warning']]
        ])->label(false); 
    ?>
    </div>
    <div class="col-lg-3">
    <?php
        $stat = ['schadueled' => 'انتظار', 'processing' => 'الأن', 'done' => 'انتهى', 'canceled' => 'الغاء'];
        echo $form->field($model, 'stat')->radioButtonGroup($stat, [
            'class' => 'btn-group-sm',
            'itemOptions' => ['labelOptions' => ['class' => 'btn btn-info']]
        ])->label(false); 
    ?>
    </div>
    <div class="col-lg-3">
    <?php echo  $form->field($model, 'physician_id') ?>
    </div>
    <div class="col-lg-3">
        <?php 
            echo $form->field($model, 'date', [
                // 'addon'=>['prepend'=>['content'=>'<i class="glyphicon glyphicon-calendar"></i>']],
                'options'=>['class'=>'drp-container form-group']
            ])->widget(DateRangePicker::classname(), [
                'name'=>'date',
                'language'=>'en',
                'presetDropdown'=>true,
                'hideInput'=>true,
                'pluginOptions' => [
                    'locale'=>[
                        // 'format'=>'Y-m-d',
                        // 'separator'=>'-',
                    ],
                    'opens' => 'right'
                ]
            ]);

        ?>
    </div>
    <div class="col-lg-3">
    <?php echo  $form->field($model, 'clinic_id') ?>
    </div>
    <div class="col-lg-3">
    <?php
        $insured = ['yes' => 'تأمين', 'no' => 'بدون تأمين'];
        echo $form->field($model, 'insured')->radioButtonGroup($insured, [
            'class' => 'btn-group-sm',
            'itemOptions' => ['labelOptions' => ['class' => 'btn btn-success']]
        ])->label(false); 
    ?>
    </div>
    <div class="col-lg-3">
    <?php echo  $form->field($model, 'insurance_id') ?>
    </div>
     <div class="col-lg-3">
    <?php 
        $paiedTo = ['app' => 'التطبيق', 'registers' => 'المسجل'];
        echo $form->field($model, 'paiedTo')->radioButtonGroup($paiedTo, [
            'class' => 'btn-group-sm',
            'itemOptions' => ['labelOptions' => ['class' => 'btn btn-danger']]
        ])->label(false);
    ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); 
    ?>

</div>

<div class="row">
    
</div>
