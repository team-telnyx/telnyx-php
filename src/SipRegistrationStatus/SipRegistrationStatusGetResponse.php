<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\CredentialType;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\SipRegistrationDetails;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\SipRegistrationStatus;

/**
 * @phpstan-import-type SipRegistrationDetailsShape from \Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\SipRegistrationDetails
 *
 * @phpstan-type SipRegistrationStatusGetResponseShape = array{
 *   connectionID?: string|null,
 *   connectionName?: string|null,
 *   credentialType?: null|CredentialType|value-of<CredentialType>,
 *   credentialUsername?: string|null,
 *   lastRegistrationResponse?: string|null,
 *   registered?: bool|null,
 *   sipRegistrationDetails?: null|SipRegistrationDetails|SipRegistrationDetailsShape,
 *   sipRegistrationStatus?: null|SipRegistrationStatus|value-of<SipRegistrationStatus>,
 * }
 */
final class SipRegistrationStatusGetResponse implements BaseModel
{
    /** @use SdkModel<SipRegistrationStatusGetResponseShape> */
    use SdkModel;

    /**
     * Identifier of the connection associated with the credential.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Human-readable connection name.
     */
    #[Optional('connection_name')]
    public ?string $connectionName;

    /**
     * The credential type that was looked up.
     *
     * @var value-of<CredentialType>|null $credentialType
     */
    #[Optional('credential_type', enum: CredentialType::class)]
    public ?string $credentialType;

    /**
     * SIP username used for the registration.
     */
    #[Optional('credential_username')]
    public ?string $credentialUsername;

    /**
     * SIP response from the last registration attempt.
     */
    #[Optional('last_registration_response')]
    public ?string $lastRegistrationResponse;

    /**
     * True if the endpoint is currently registered.
     */
    #[Optional]
    public ?bool $registered;

    /**
     * Detailed registration information reported by the registrar. The populated fields depend on `credential_type`.
     */
    #[Optional('sip_registration_details')]
    public ?SipRegistrationDetails $sipRegistrationDetails;

    /**
     * Human-readable registration status derived from the registrar state.
     *
     * @var value-of<SipRegistrationStatus>|null $sipRegistrationStatus
     */
    #[Optional('sip_registration_status', enum: SipRegistrationStatus::class)]
    public ?string $sipRegistrationStatus;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CredentialType|value-of<CredentialType>|null $credentialType
     * @param SipRegistrationDetails|SipRegistrationDetailsShape|null $sipRegistrationDetails
     * @param SipRegistrationStatus|value-of<SipRegistrationStatus>|null $sipRegistrationStatus
     */
    public static function with(
        ?string $connectionID = null,
        ?string $connectionName = null,
        CredentialType|string|null $credentialType = null,
        ?string $credentialUsername = null,
        ?string $lastRegistrationResponse = null,
        ?bool $registered = null,
        SipRegistrationDetails|array|null $sipRegistrationDetails = null,
        SipRegistrationStatus|string|null $sipRegistrationStatus = null,
    ): self {
        $self = new self;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $credentialType && $self['credentialType'] = $credentialType;
        null !== $credentialUsername && $self['credentialUsername'] = $credentialUsername;
        null !== $lastRegistrationResponse && $self['lastRegistrationResponse'] = $lastRegistrationResponse;
        null !== $registered && $self['registered'] = $registered;
        null !== $sipRegistrationDetails && $self['sipRegistrationDetails'] = $sipRegistrationDetails;
        null !== $sipRegistrationStatus && $self['sipRegistrationStatus'] = $sipRegistrationStatus;

        return $self;
    }

    /**
     * Identifier of the connection associated with the credential.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Human-readable connection name.
     */
    public function withConnectionName(string $connectionName): self
    {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * The credential type that was looked up.
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
     * SIP username used for the registration.
     */
    public function withCredentialUsername(string $credentialUsername): self
    {
        $self = clone $this;
        $self['credentialUsername'] = $credentialUsername;

        return $self;
    }

    /**
     * SIP response from the last registration attempt.
     */
    public function withLastRegistrationResponse(
        string $lastRegistrationResponse
    ): self {
        $self = clone $this;
        $self['lastRegistrationResponse'] = $lastRegistrationResponse;

        return $self;
    }

    /**
     * True if the endpoint is currently registered.
     */
    public function withRegistered(bool $registered): self
    {
        $self = clone $this;
        $self['registered'] = $registered;

        return $self;
    }

    /**
     * Detailed registration information reported by the registrar. The populated fields depend on `credential_type`.
     *
     * @param SipRegistrationDetails|SipRegistrationDetailsShape $sipRegistrationDetails
     */
    public function withSipRegistrationDetails(
        SipRegistrationDetails|array $sipRegistrationDetails
    ): self {
        $self = clone $this;
        $self['sipRegistrationDetails'] = $sipRegistrationDetails;

        return $self;
    }

    /**
     * Human-readable registration status derived from the registrar state.
     *
     * @param SipRegistrationStatus|value-of<SipRegistrationStatus> $sipRegistrationStatus
     */
    public function withSipRegistrationStatus(
        SipRegistrationStatus|string $sipRegistrationStatus
    ): self {
        $self = clone $this;
        $self['sipRegistrationStatus'] = $sipRegistrationStatus;

        return $self;
    }
}
