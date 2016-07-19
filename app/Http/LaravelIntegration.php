<?php namespace App\Http;

use \Illuminate\Http\Request;
use \Illuminate\Http\Response;
use \Neomerx\Limoncello\Config\Config;
use \Neomerx\Limoncello\Http\FrameworkIntegration;
use \Neomerx\JsonApi\Contracts\Parameters\SupportedExtensionsInterface;

/* TODO: I think this belongs somewhere else? maybe App\Http\JsonApi? */

class LaravelIntegration extends FrameworkIntegration
{
	/**
	 * @var Request
	 */
	private $currentRequest;

	/**
	 * @inheritdoc
	 */
	public function getConfig()
	{
		return config(Config::NAME, []);
	}

	/**
	 * @inheritdoc
	 *
	 * @return Request
	 */
	public function getCurrentRequest()
	{
		if ($this->currentRequest === null) {
			$this->currentRequest = app(Request::class);
		}

		return $this->currentRequest;
	}

	/**
	 * @inheritdoc
	 */
	public function declareSupportedExtensions(SupportedExtensionsInterface $extensions)
	{
		app()->instance(SupportedExtensionsInterface::class, $extensions);
	}

	/**
	 * @inheritdoc
	 *
	 * @return Response
	 */
	public function createResponse($content, $statusCode, array $headers)
	{
		return new Response($content, $statusCode, $headers);
	}
}
