<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage\Meta;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage\Source;

/**
 * @phpstan-type LogMessageGetResponseShape = array{
 *   log_messages?: list<LogMessage>|null
 * }
 */
final class LogMessageGetResponse implements BaseModel
{
    /** @use SdkModel<LogMessageGetResponseShape> */
    use SdkModel;

    /** @var list<LogMessage>|null $log_messages */
    #[Optional(list: LogMessage::class)]
    public ?array $log_messages;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<LogMessage|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: Meta|null,
     *   source?: Source|null,
     * }> $log_messages
     */
    public static function with(?array $log_messages = null): self
    {
        $obj = new self;

        null !== $log_messages && $obj['log_messages'] = $log_messages;

        return $obj;
    }

    /**
     * @param list<LogMessage|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: Meta|null,
     *   source?: Source|null,
     * }> $logMessages
     */
    public function withLogMessages(array $logMessages): self
    {
        $obj = clone $this;
        $obj['log_messages'] = $logMessages;

        return $obj;
    }
}
