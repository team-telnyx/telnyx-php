<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage;

/**
 * @phpstan-import-type LogMessageShape from \Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage
 *
 * @phpstan-type LogMessageGetResponseShape = array{
 *   logMessages?: list<LogMessageShape>|null
 * }
 */
final class LogMessageGetResponse implements BaseModel
{
    /** @use SdkModel<LogMessageGetResponseShape> */
    use SdkModel;

    /** @var list<LogMessage>|null $logMessages */
    #[Optional('log_messages', list: LogMessage::class)]
    public ?array $logMessages;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<LogMessageShape> $logMessages
     */
    public static function with(?array $logMessages = null): self
    {
        $self = new self;

        null !== $logMessages && $self['logMessages'] = $logMessages;

        return $self;
    }

    /**
     * @param list<LogMessageShape> $logMessages
     */
    public function withLogMessages(array $logMessages): self
    {
        $self = clone $this;
        $self['logMessages'] = $logMessages;

        return $self;
    }
}
