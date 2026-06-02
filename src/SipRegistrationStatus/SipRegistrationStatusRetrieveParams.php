<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus;

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
 *   connectionID: string, credentialType: CredentialType|value-of<CredentialType>
 * }
 */
final class SipRegistrationStatusRetrieveParams implements BaseModel
{
    /** @use SdkModel<SipRegistrationStatusRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifier of the UAC connection to look up.
     */
    #[Required]
    public string $connectionID;

    /**
     * The kind of credential to look up. Only `uac_external_credential` is supported today.
     *
     * @var value-of<CredentialType> $credentialType
     */
    #[Required(enum: CredentialType::class)]
    public string $credentialType;

    /**
     * `new SipRegistrationStatusRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SipRegistrationStatusRetrieveParams::with(
     *   connectionID: ..., credentialType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SipRegistrationStatusRetrieveParams)
     *   ->withConnectionID(...)
     *   ->withCredentialType(...)
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
        string $connectionID,
        CredentialType|string $credentialType
    ): self {
        $self = new self;

        $self['connectionID'] = $connectionID;
        $self['credentialType'] = $credentialType;

        return $self;
    }

    /**
     * Identifier of the UAC connection to look up.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * The kind of credential to look up. Only `uac_external_credential` is supported today.
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
}
