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
 * @phpstan-type LogMessageListResponseShape = array{
 *   log_messages?: list<LogMessage>|null,
 *   meta?: ExternalVoiceIntegrationsPaginationMeta|null,
 * }
 */
final class LogMessageListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<LogMessageListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<LogMessage>|null $log_messages */
    #[Api(list: LogMessage::class, optional: true)]
    public ?array $log_messages;

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
     * @param list<LogMessage> $log_messages
     */
    public static function with(
        ?array $log_messages = null,
        ?ExternalVoiceIntegrationsPaginationMeta $meta = null,
    ): self {
        $obj = new self;

        null !== $log_messages && $obj->log_messages = $log_messages;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<LogMessage> $logMessages
     */
    public function withLogMessages(array $logMessages): self
    {
        $obj = clone $this;
        $obj->log_messages = $logMessages;

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
