<?php
declare(strict_types = 1);

/**
 * @var View $this
 * @var CloudStorage $model
 */

use cusodede\s3\models\cloud_storage\CloudStorage;
use cusodede\s3\S3Module;
use pozitronik\widgets\BadgeWidget;
use yii\web\View;
use yii\widgets\DetailView;

?>

<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
		'id',
		'bucket',
		'key',
		[
			'attribute' => 'filename',
			'format' => 'raw',
			'value' => static fn(CloudStorage $model) => BadgeWidget::widget([
				'items' => $model->filename,
				'urlScheme' => [S3Module::to(['download']), 'id' => $model->id]
			])
		],
		'created_at',
		'deleted:boolean',
		'uploaded:boolean'
	]
]) ?>
