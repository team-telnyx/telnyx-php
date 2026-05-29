<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams\CredentialType;

/**
 * Returns the live SIP registration state of a connection or credential. Supports UAC third-party credentials, telephony credentials, and SIP credential connections.
 *
 * @see Telnyx\Services\SipRegistrationStatusService::retrieve()
 *
 * @phpstan-type SipRegistrationStatusRetrieveParamsShape = array{
 *   connectionID: string,
 *   credentialType: CredentialType|value-of<CredentialType>,
 *   userID: string,
 * }
 */
final class SipRegistrationStatusRetrieveParams implements BaseModel
{
    /** @use SdkModel<SipRegistrationStatusRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifier of the connection or credential to look up.
     */
    #[Required]
    public string $connectionID;

    /**
     * The kind of credential to look up.
     *
     * @var value-of<CredentialType> $credentialType
     */
    #[Required(enum: CredentialType::class)]
    public string $credentialType;

    /**
     * Owner of the connection. Used to authorize the lookup.
     */
    #[Required]
    public string $userID;

    /**
     * `new SipRegistrationStatusRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SipRegistrationStatusRetrieveParams::with(
     *   connectionID: ..., credentialType: ..., userID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SipRegistrationStatusRetrieveParams)
     *   ->withConnectionID(...)
     *   ->withCredentialType(...)
     *   ->withUserID(...)
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
        CredentialType|string $credentialType,
        string $userID
    ): self {
        $self = new self;

        $self['connectionID'] = $connectionID;
        $self['credentialType'] = $credentialType;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Identifier of the connection or credential to look up.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * The kind of credential to look up.
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
     * Owner of the connection. Used to authorize the lookup.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
