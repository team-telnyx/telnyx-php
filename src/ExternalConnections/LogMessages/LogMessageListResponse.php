<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalVoiceIntegrationsPaginationMeta;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse\LogMessage;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse\LogMessage\Meta;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse\LogMessage\Source;

/**
 * @phpstan-type LogMessageListResponseShape = array{
 *   logMessages?: list<LogMessage>|null,
 *   meta?: ExternalVoiceIntegrationsPaginationMeta|null,
 * }
 */
final class LogMessageListResponse implements BaseModel
{
    /** @use SdkModel<LogMessageListResponseShape> */
    use SdkModel;

    /** @var list<LogMessage>|null $logMessages */
    #[Optional('log_messages', list: LogMessage::class)]
    public ?array $logMessages;

    #[Optional]
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
     * @param list<LogMessage|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: Meta|null,
     *   source?: Source|null,
     * }> $logMessages
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $logMessages = null,
        ExternalVoiceIntegrationsPaginationMeta|array|null $meta = null,
    ): self {
        $obj = new self;

        null !== $logMessages && $obj['logMessages'] = $logMessages;
        null !== $meta && $obj['meta'] = $meta;

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

    /**
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(
        ExternalVoiceIntegrationsPaginationMeta|array $meta
    ): self {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
