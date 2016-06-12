<?php


namespace Laramessage;

/**
 * Class Response
 *
 * @package Laramessage
 */
class Response {

	const ERROR = 'error';

	const WARNING = 'warning';

	const SUCCESS = 'success';

	const MSG_DEFAULT = 'default';

	private $messages;

	public function __construct() {

		$this->messages = new Messages();
	}

	public function getMessages() {

		return $this->messages;
	}

	public function addMessageToResponse(Message $message) {

		$context = $message->context ?: static::MSG_DEFAULT;
		$this->messages->$context[] = $message;
	}

	public function getErrorMessages() {

		return $this->messages->error;
	}

	public function getWarningMessage() {

		return $this->messages->warning;
	}

	public function getSuccessMessages() {

		return $this->messages->success;
	}

	public function getDefaultMessages() {

		return $this->messages->default;
	}

	protected function getCustomMessagesByContext($context) {

		return $this->messages->$context;
	}

	protected function all() {

		return array_merge($this->messages->default, array_merge($this->messages->success, array_merge($this->messages->warning, $this->messages->error)));
	}
}