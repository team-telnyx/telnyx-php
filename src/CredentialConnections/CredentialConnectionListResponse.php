<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialConnection\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnection\WebhookAPIVersion;

/**
 * @phpstan-type CredentialConnectionListResponseShape = array{
 *   data?: list<CredentialConnection>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class CredentialConnectionListResponse implements BaseModel
{
    /** @use SdkModel<CredentialConnectionListResponseShape> */
    use SdkModel;

    /** @var list<CredentialConnection>|null $data */
    #[Optional(list: CredentialConnection::class)]
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
     * @param list<CredentialConnection|array{
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
     *   inbound?: CredentialInbound|null,
     *   onnetT38PassthroughEnabled?: bool|null,
     *   outbound?: CredentialOutbound|null,
     *   password?: string|null,
     *   recordType?: string|null,
     *   rtcpSettings?: ConnectionRtcpSettings|null,
     *   sipUriCallingPreference?: value-of<SipUriCallingPreference>|null,
     *   tags?: list<string>|null,
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
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<CredentialConnection|array{
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
     *   inbound?: CredentialInbound|null,
     *   onnetT38PassthroughEnabled?: bool|null,
     *   outbound?: CredentialOutbound|null,
     *   password?: string|null,
     *   recordType?: string|null,
     *   rtcpSettings?: ConnectionRtcpSettings|null,
     *   sipUriCallingPreference?: value-of<SipUriCallingPreference>|null,
     *   tags?: list<string>|null,
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
        $self = clone $this;
        $self['data'] = $data;

        return $self;
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
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
