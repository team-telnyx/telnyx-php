<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage;

/**
 * @phpstan-type log_message_get_response = array{logMessages?: list<LogMessage>}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class LogMessageGetResponse implements BaseModel
{
    /** @use SdkModel<log_message_get_response> */
    use SdkModel;

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
