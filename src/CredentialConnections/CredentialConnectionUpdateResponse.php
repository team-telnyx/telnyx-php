<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialConnection\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnection\WebhookAPIVersion;

/**
 * @phpstan-type CredentialConnectionUpdateResponseShape = array{
 *   data?: CredentialConnection|null
 * }
 */
final class CredentialConnectionUpdateResponse implements BaseModel
{
    /** @use SdkModel<CredentialConnectionUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CredentialConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CredentialConnection|array{
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
     * } $data
     */
    public static function with(CredentialConnection|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param CredentialConnection|array{
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
     * } $data
     */
    public function withData(CredentialConnection|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
