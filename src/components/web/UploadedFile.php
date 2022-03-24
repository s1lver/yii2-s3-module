<?php
declare(strict_types = 1);

namespace cusodede\s3\components\web;

use pozitronik\helpers\ReflectionHelper;
use ReflectionException;
use yii\base\UnknownClassException;
use yii\web\UploadedFile as YiiUploadedFile;

/**
 * Class UploadedFile
 * @property-read ?resource $resource
 */
class UploadedFile extends YiiUploadedFile {

	/**
	 * @return ?resource
	 * @throws ReflectionException
	 * @throws UnknownClassException
	 */
	public function getResource() {
		return ReflectionHelper::getValue(parent::class, '_tempResource', $this);
	}

	/**
	 * @inheritDoc
	 * Для приведения типа
	 */
	public static function getInstance($model, $attribute):self {
		return parent::getInstance($model, $attribute);
	}

}