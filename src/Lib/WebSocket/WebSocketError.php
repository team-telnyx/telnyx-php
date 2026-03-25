<?php

declare(strict_types=1);

namespace Telnyx\Lib\WebSocket;

use Exception;

/**
 * Exception thrown for WebSocket-related errors.
 */
class WebSocketError extends \Exception
{
    /**
     * The error data from the server, if available.
     *
     * @var array<string, mixed>|null
     */
    public ?array $errorData;

    /**
     * The original cause of the error, if any.
     */
    public ?\Throwable $cause;

    /**
     * @param string $message Error message
     * @param array<string, mixed>|null $errorData Error data from server event
     * @param \Throwable|null $cause Original exception
     */
    public function __construct(
        string $message,
        ?array $errorData = null,
        ?\Throwable $cause = null
    ) {
        parent::__construct($message, 0, $cause);
        $this->errorData = $errorData;
        $this->cause = $cause;
    }
}
