<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ExternalConnections\ExternalVoiceIntegrationsPaginationMeta;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse\LogMessage;

/**
 * @phpstan-type log_message_list_response = array{
 *   logMessages?: list<LogMessage>, meta?: ExternalVoiceIntegrationsPaginationMeta
 * }
 */
final class LogMessageListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<log_message_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<LogMessage>|null $logMessages */
    #[Api('log_messages', list: LogMessage::class, optional: true)]
    public ?array $logMessages;

    #[Api(optional: true)]
    public ?ExternalVoiceIntegrationsPaginationMeta $meta;

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
    public static function with(
        ?array $logMessages = null,
        ?ExternalVoiceIntegrationsPaginationMeta $meta = null,
    ): self {
        $obj = new self;

        null !== $logMessages && $obj->logMessages = $logMessages;
        null !== $meta && $obj->meta = $meta;

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

    public function withMeta(
        ExternalVoiceIntegrationsPaginationMeta $meta
    ): self {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
