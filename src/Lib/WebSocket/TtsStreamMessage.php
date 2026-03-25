<?php

declare(strict_types=1);

namespace Telnyx\Lib\WebSocket;

/**
 * Message type for Text-to-Speech stream iterator.
 *
 * Represents lifecycle and message events from the WebSocket stream.
 */
class TtsStreamMessage
{
    /**
     * Message type: "connecting", "open", "closing", "close", "message", or "error".
     */
    public string $type;

    /**
     * Server event (for "message" type).
     */
    public ?TtsServerEvent $message;

    /**
     * Error (for "error" type).
     */
    public ?WebSocketError $error;

    /**
     * @param string $type Message type
     * @param TtsServerEvent|null $message Server event
     * @param WebSocketError|null $error Error
     */
    public function __construct(
        string $type,
        ?TtsServerEvent $message = null,
        ?WebSocketError $error = null
    ) {
        $this->type = $type;
        $this->message = $message;
        $this->error = $error;
    }

    /**
     * Check if this is a connecting message.
     */
    public function isConnecting(): bool
    {
        return 'connecting' === $this->type;
    }

    /**
     * Check if this is an open message.
     */
    public function isOpen(): bool
    {
        return 'open' === $this->type;
    }

    /**
     * Check if this is a closing message.
     */
    public function isClosing(): bool
    {
        return 'closing' === $this->type;
    }

    /**
     * Check if this is a close message.
     */
    public function isClose(): bool
    {
        return 'close' === $this->type;
    }

    /**
     * Check if this is a message event.
     */
    public function isMessage(): bool
    {
        return 'message' === $this->type;
    }

    /**
     * Check if this is an error.
     */
    public function isError(): bool
    {
        return 'error' === $this->type;
    }
}
