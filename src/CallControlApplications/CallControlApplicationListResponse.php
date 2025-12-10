<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\CallControlApplications\CallControlApplication\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplication\DtmfType;
use Telnyx\CallControlApplications\CallControlApplication\RecordType;
use Telnyx\CallControlApplications\CallControlApplication\WebhookAPIVersion;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallControlApplicationListResponseShape = array{
 *   data?: list<CallControlApplication>|null, meta?: PaginationMeta|null
 * }
 */
final class CallControlApplicationListResponse implements BaseModel
{
    /** @use SdkModel<CallControlApplicationListResponseShape> */
    use SdkModel;

    /** @var list<CallControlApplication>|null $data */
    #[Optional(list: CallControlApplication::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CallControlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   applicationName?: string|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   firstCommandTimeout?: bool|null,
     *   firstCommandTimeoutSecs?: int|null,
     *   inbound?: CallControlApplicationInbound|null,
     *   outbound?: CallControlApplicationOutbound|null,
     *   recordType?: value-of<RecordType>|null,
     *   redactDtmfDebugLogging?: bool|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<CallControlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   applicationName?: string|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   firstCommandTimeout?: bool|null,
     *   firstCommandTimeoutSecs?: int|null,
     *   inbound?: CallControlApplicationInbound|null,
     *   outbound?: CallControlApplicationOutbound|null,
     *   recordType?: value-of<RecordType>|null,
     *   redactDtmfDebugLogging?: bool|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
