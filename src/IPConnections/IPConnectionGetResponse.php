<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

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
 * @phpstan-type IPConnectionGetResponseShape = array{data?: IPConnection|null}
 */
final class IPConnectionGetResponse implements BaseModel
{
    /** @use SdkModel<IPConnectionGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?IPConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IPConnection|array{
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
     * } $data
     */
    public static function with(IPConnection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param IPConnection|array{
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
     * } $data
     */
    public function withData(IPConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
