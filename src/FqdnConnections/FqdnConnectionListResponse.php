<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;

/**
 * @phpstan-type FqdnConnectionListResponseShape = array{
 *   data?: list<FqdnConnection>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class FqdnConnectionListResponse implements BaseModel
{
    /** @use SdkModel<FqdnConnectionListResponseShape> */
    use SdkModel;

    /** @var list<FqdnConnection>|null $data */
    #[Optional(list: FqdnConnection::class)]
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
     * @param list<FqdnConnection|array{
     *   connectionName: string,
     *   id?: string|null,
     *   active?: bool|null,
     *   adjustDtmfTimestamp?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   callCostEnabled?: bool|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   defaultOnHoldComfortNoiseEnabled?: bool|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   encodeContactHeaderEnabled?: bool|null,
     *   encryptedMedia?: value-of<EncryptedMedia>|null,
     *   ignoreDtmfDuration?: bool|null,
     *   ignoreMarkBit?: bool|null,
     *   inbound?: InboundFqdn|null,
     *   microsoftTeamsSbc?: bool|null,
     *   noiseSuppression?: bool|null,
     *   onnetT38PassthroughEnabled?: bool|null,
     *   outbound?: OutboundFqdn|null,
     *   password?: string|null,
     *   recordType?: string|null,
     *   rtcpSettings?: ConnectionRtcpSettings|null,
     *   rtpPassCodecsOnStreamChange?: bool|null,
     *   sendNormalizedTimestamps?: bool|null,
     *   tags?: list<string>|null,
     *   thirdPartyControlEnabled?: bool|null,
     *   transportProtocol?: value-of<TransportProtocol>|null,
     *   txtName?: string|null,
     *   txtTtl?: int|null,
     *   txtValue?: string|null,
     *   updatedAt?: string|null,
     *   userName?: string|null,
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
     * @param list<FqdnConnection|array{
     *   connectionName: string,
     *   id?: string|null,
     *   active?: bool|null,
     *   adjustDtmfTimestamp?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   callCostEnabled?: bool|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   defaultOnHoldComfortNoiseEnabled?: bool|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   encodeContactHeaderEnabled?: bool|null,
     *   encryptedMedia?: value-of<EncryptedMedia>|null,
     *   ignoreDtmfDuration?: bool|null,
     *   ignoreMarkBit?: bool|null,
     *   inbound?: InboundFqdn|null,
     *   microsoftTeamsSbc?: bool|null,
     *   noiseSuppression?: bool|null,
     *   onnetT38PassthroughEnabled?: bool|null,
     *   outbound?: OutboundFqdn|null,
     *   password?: string|null,
     *   recordType?: string|null,
     *   rtcpSettings?: ConnectionRtcpSettings|null,
     *   rtpPassCodecsOnStreamChange?: bool|null,
     *   sendNormalizedTimestamps?: bool|null,
     *   tags?: list<string>|null,
     *   thirdPartyControlEnabled?: bool|null,
     *   transportProtocol?: value-of<TransportProtocol>|null,
     *   txtName?: string|null,
     *   txtTtl?: int|null,
     *   txtValue?: string|null,
     *   updatedAt?: string|null,
     *   userName?: string|null,
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
