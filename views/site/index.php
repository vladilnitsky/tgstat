<?php

/** @var yii\web\View $this */
/** @var app\models\UrlForm $model */
/** @var string $hashedUrl */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Short urls generator';
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="site-index">
    <div class="body-content">

		<div class="row">
			<div class="col-lg-5">

				<?php $form = ActiveForm::begin([
					'id' => 'saved-url-form',
					'fieldConfig' => [
						'template' => "{label}\n{input}\n{error}",
						'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
						'inputOptions' => ['class' => 'col-lg-3 form-control'],
						'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
					],
				]); ?>

				<?= $form->field($model, 'url')->textInput(['autofocus' => true]) ?>

				<div class="form-group">
					<div>
						<?= Html::submitButton('Generate', ['class' => 'btn btn-primary', 'name' => 'generate-button']) ?>
					</div>
				</div>

				<?php ActiveForm::end(); ?>
				
                <a href="<?php echo $hashedUrl?>"><?php echo $hashedUrl?></a>
			</div>
		</div>
    </div>
</div>
