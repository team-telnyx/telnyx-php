<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage;

/**
 * @phpstan-type LogMessageGetResponseShape = array{logMessages?: list<LogMessage>}
 */
final class LogMessageGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<LogMessageGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<LogMessage>|null $logMessages */
    #[Api('log_messages', list: LogMessage::class, optional: true)]
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
     * @param list<LogMessage> $logMessages
     */
    public static function with(?array $logMessages = null): self
    {
        $obj = new self;

        null !== $logMessages && $obj->logMessages = $logMessages;

        return $obj;
    }

    /**
     * @param list<LogMessage> $logMessages
     */
    public function withLogMessages(array $logMessages): self
    {
        $obj = clone $this;
        $obj->logMessages = $logMessages;

        return $obj;
    }
}
