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
 *   log_messages?: list<LogMessage>|null,
 *   meta?: ExternalVoiceIntegrationsPaginationMeta|null,
 * }
 */
final class LogMessageListResponse implements BaseModel
{
    /** @use SdkModel<LogMessageListResponseShape> */
    use SdkModel;

    /** @var list<LogMessage>|null $log_messages */
    #[Optional(list: LogMessage::class)]
    public ?array $log_messages;

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
     * }> $log_messages
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $log_messages = null,
        ExternalVoiceIntegrationsPaginationMeta|array|null $meta = null,
    ): self {
        $obj = new self;

        null !== $log_messages && $obj['log_messages'] = $log_messages;
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
        $obj['log_messages'] = $logMessages;

        return $obj;
    }

    /**
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
