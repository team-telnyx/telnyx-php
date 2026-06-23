<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams\CredentialType;

/**
 * Returns the live SIP registration state of a UAC connection: whether it is currently registered, when it last registered, and the last response Telnyx received from the registrar. Only `uac_external_credential` is supported today.
 *
 * @see Telnyx\Services\SipRegistrationStatusService::retrieve()
 *
 * @phpstan-type SipRegistrationStatusRetrieveParamsShape = array{
 *   credentialType: CredentialType|value-of<CredentialType>,
 *   connectionID?: string|null,
 *   username?: string|null,
 * }
 */
final class SipRegistrationStatusRetrieveParams implements BaseModel
{
    /** @use SdkModel<SipRegistrationStatusRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The kind of credential to look up. `uac_external_credential` is keyed by `connection_id`; `telephony_credential` is keyed by `username`.
     *
     * @var value-of<CredentialType> $credentialType
     */
    #[Required(enum: CredentialType::class)]
    public string $credentialType;

    /**
     * Identifier of the UAC connection to look up. Required when `credential_type` is `uac_external_credential`.
     */
    #[Optional]
    public ?string $connectionID;

    /**
     * SIP username of the telephony credential to look up. Required when `credential_type` is `telephony_credential`.
     */
    #[Optional]
    public ?string $username;

    /**
     * `new SipRegistrationStatusRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SipRegistrationStatusRetrieveParams::with(credentialType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SipRegistrationStatusRetrieveParams)->withCredentialType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CredentialType|value-of<CredentialType> $credentialType
     */
    public static function with(
        CredentialType|string $credentialType,
        ?string $connectionID = null,
        ?string $username = null,
    ): self {
        $self = new self;

        $self['credentialType'] = $credentialType;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * The kind of credential to look up. `uac_external_credential` is keyed by `connection_id`; `telephony_credential` is keyed by `username`.
     *
     * @param CredentialType|value-of<CredentialType> $credentialType
     */
    public function withCredentialType(
        CredentialType|string $credentialType
    ): self {
        $self = clone $this;
        $self['credentialType'] = $credentialType;

        return $self;
    }

    /**
     * Identifier of the UAC connection to look up. Required when `credential_type` is `uac_external_credential`.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * SIP username of the telephony credential to look up. Required when `credential_type` is `telephony_credential`.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
