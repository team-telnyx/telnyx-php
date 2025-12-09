<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\IPConnections\IPConnection\TransportProtocol;
use Telnyx\IPConnections\IPConnection\WebhookAPIVersion;

/**
 * @phpstan-type IPConnectionListResponseShape = array{
 *   data?: list<IPConnection>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class IPConnectionListResponse implements BaseModel
{
    /** @use SdkModel<IPConnectionListResponseShape> */
    use SdkModel;

    /** @var list<IPConnection>|null $data */
    #[Optional(list: IPConnection::class)]
    public ?array $data;

    #[Optional]
    public ?ConnectionsPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<IPConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   callCostInWebhooks?: bool|null,
     *   connectionName?: string|null,
     *   createdAt?: string|null,
     *   defaultOnHoldComfortNoiseEnabled?: bool|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   encodeContactHeaderEnabled?: bool|null,
     *   encryptedMedia?: value-of<EncryptedMedia>|null,
     *   inbound?: InboundIP|null,
     *   onnetT38PassthroughEnabled?: bool|null,
     *   outbound?: OutboundIP|null,
     *   recordType?: string|null,
     *   rtcpSettings?: ConnectionRtcpSettings|null,
     *   tags?: list<string>|null,
     *   transportProtocol?: value-of<TransportProtocol>|null,
     *   updatedAt?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }> $data
     * @param ConnectionsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        ConnectionsPaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<IPConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   callCostInWebhooks?: bool|null,
     *   connectionName?: string|null,
     *   createdAt?: string|null,
     *   defaultOnHoldComfortNoiseEnabled?: bool|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   encodeContactHeaderEnabled?: bool|null,
     *   encryptedMedia?: value-of<EncryptedMedia>|null,
     *   inbound?: InboundIP|null,
     *   onnetT38PassthroughEnabled?: bool|null,
     *   outbound?: OutboundIP|null,
     *   recordType?: string|null,
     *   rtcpSettings?: ConnectionRtcpSettings|null,
     *   tags?: list<string>|null,
     *   transportProtocol?: value-of<TransportProtocol>|null,
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
     * @param ConnectionsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(ConnectionsPaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
