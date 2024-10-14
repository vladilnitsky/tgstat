<?php

namespace app\controllers;

use app\services\UrlServiceInterface;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\UrlForm;

class SiteController extends Controller
{
    private UrlServiceInterface $urlService;

    public function __construct($id, $module, UrlServiceInterface $urlService, $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->urlService = $urlService;
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex(): string
    {
        $errors = [];
        $hashedUrl = '';
        $model = new UrlForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $hash = $this->urlService->createUrl($model->url);
            $hashedUrl = $this->urlService->makeHashedUrl($hash);
        }

        $errors += $model->getErrors();

        return $this->render('index', [
            'model' => $model,
            'hashedUrl' => $hashedUrl,
            'errors' => $errors
        ]);
    }

	public function actionRedirect(string $hash): Response
	{
		$url = $this->urlService->getUrl($hash);

		return $this->redirect($url);
	}
}
