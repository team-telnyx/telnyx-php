<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalConnection\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnection\Inbound;
use Telnyx\ExternalConnections\ExternalConnection\Outbound;
use Telnyx\ExternalConnections\ExternalConnection\WebhookAPIVersion;

/**
 * @phpstan-type ExternalConnectionListResponseShape = array{
 *   data?: list<ExternalConnection>|null,
 *   meta?: ExternalVoiceIntegrationsPaginationMeta|null,
 * }
 */
final class ExternalConnectionListResponse implements BaseModel
{
    /** @use SdkModel<ExternalConnectionListResponseShape> */
    use SdkModel;

    /** @var list<ExternalConnection>|null $data */
    #[Optional(list: ExternalConnection::class)]
    public ?array $data;

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
     * @param list<ExternalConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: string|null,
     *   credentialActive?: bool|null,
     *   externalSipConnection?: value-of<ExternalSipConnection>|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }> $data
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        ExternalVoiceIntegrationsPaginationMeta|array|null $meta = null,
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<ExternalConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: string|null,
     *   credentialActive?: bool|null,
     *   externalSipConnection?: value-of<ExternalSipConnection>|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
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
        $obj = clone $this;
        $obj['data'] = $data;

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
