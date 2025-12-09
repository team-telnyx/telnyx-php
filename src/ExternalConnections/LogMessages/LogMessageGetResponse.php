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
 *   logMessages?: list<LogMessage>|null
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
     * @param list<LogMessage|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: Meta|null,
     *   source?: Source|null,
     * }> $logMessages
     */
    public static function with(?array $logMessages = null): self
    {
        $obj = new self;

        null !== $logMessages && $obj['logMessages'] = $logMessages;

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
        $obj['logMessages'] = $logMessages;

        return $obj;
    }
}
