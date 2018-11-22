<?php
namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
	public function apiException($request, $e){
		if($this->isModel($e)){
            return $this->ModelResponse($e);
        }

        if ($this->isHttp($e)) {
           return $this->HttpResponse($e);
        }

        if ($this->isRequest($e)) {
           return $this->RequestResponse($e);
        }
        return parent::render($request, $e);
	}

	protected function isModel($e){
		return $e instanceof ModelNotFoundException;
	}

	protected function isHttp($e){
		return $e instanceof NotFoundHttpException;
	}

	protected function isRequest($e){
		return $e instanceof MethodNotAllowedHttpException;
	}

	protected function ModelResponse($e){
		return 	response()->json([
	                'error' => 'Model Not Found'
            	],Response::HTTP_NOT_FOUND);
	}

	protected function HttpResponse($e){
		return  response()->json([
                	'error' => 'Incorrect Route'
            	],Response::HTTP_NOT_FOUND);
	}

	protected function RequestResponse($e){
		return  response()->json([
                	'error' => 'Incorrect Request'
            	],Response::HTTP_NOT_FOUND);
	}
}
?>