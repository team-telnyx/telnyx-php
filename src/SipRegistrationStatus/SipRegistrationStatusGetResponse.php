<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\ExternalUacSettings;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\InternalUacSettings;

/**
 * @phpstan-import-type ExternalUacSettingsShape from \Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\ExternalUacSettings
 * @phpstan-import-type InternalUacSettingsShape from \Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse\InternalUacSettings
 *
 * @phpstan-type SipRegistrationStatusGetResponseShape = array{
 *   connectionID?: string|null,
 *   connectionName?: string|null,
 *   externalUacSettings?: null|ExternalUacSettings|ExternalUacSettingsShape,
 *   internalUacSettings?: null|InternalUacSettings|InternalUacSettingsShape,
 *   lastRegistrationResponse?: string|null,
 *   pairState?: string|null,
 *   registered?: bool|null,
 *   userID?: string|null,
 *   username?: string|null,
 * }
 */
final class SipRegistrationStatusGetResponse implements BaseModel
{
    /** @use SdkModel<SipRegistrationStatusGetResponseShape> */
    use SdkModel;

    /**
     * Identifier of the resource.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Human-readable connection name.
     */
    #[Optional('connection_name')]
    public ?string $connectionName;

    /**
     * Outward-facing SIP settings used for registration. Password is redacted.
     */
    #[Optional('external_uac_settings')]
    public ?ExternalUacSettings $externalUacSettings;

    /**
     * Internal routing target the connection delivers calls to.
     */
    #[Optional('internal_uac_settings')]
    public ?InternalUacSettings $internalUacSettings;

    /**
     * SIP response from the last registration attempt.
     */
    #[Optional('last_registration_response')]
    public ?string $lastRegistrationResponse;

    /**
     * Internal pairing state, e.g. ACTIVE or INACTIVE.
     */
    #[Optional('pair_state')]
    public ?string $pairState;

    /**
     * True if the endpoint is currently registered.
     */
    #[Optional]
    public ?bool $registered;

    /**
     * Owner of the resource.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * SIP username used for the registration.
     */
    #[Optional]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalUacSettings|ExternalUacSettingsShape|null $externalUacSettings
     * @param InternalUacSettings|InternalUacSettingsShape|null $internalUacSettings
     */
    public static function with(
        ?string $connectionID = null,
        ?string $connectionName = null,
        ExternalUacSettings|array|null $externalUacSettings = null,
        InternalUacSettings|array|null $internalUacSettings = null,
        ?string $lastRegistrationResponse = null,
        ?string $pairState = null,
        ?bool $registered = null,
        ?string $userID = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $externalUacSettings && $self['externalUacSettings'] = $externalUacSettings;
        null !== $internalUacSettings && $self['internalUacSettings'] = $internalUacSettings;
        null !== $lastRegistrationResponse && $self['lastRegistrationResponse'] = $lastRegistrationResponse;
        null !== $pairState && $self['pairState'] = $pairState;
        null !== $registered && $self['registered'] = $registered;
        null !== $userID && $self['userID'] = $userID;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * Identifier of the resource.
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
     * Outward-facing SIP settings used for registration. Password is redacted.
     *
     * @param ExternalUacSettings|ExternalUacSettingsShape $externalUacSettings
     */
    public function withExternalUacSettings(
        ExternalUacSettings|array $externalUacSettings
    ): self {
        $self = clone $this;
        $self['externalUacSettings'] = $externalUacSettings;

        return $self;
    }

    /**
     * Internal routing target the connection delivers calls to.
     *
     * @param InternalUacSettings|InternalUacSettingsShape $internalUacSettings
     */
    public function withInternalUacSettings(
        InternalUacSettings|array $internalUacSettings
    ): self {
        $self = clone $this;
        $self['internalUacSettings'] = $internalUacSettings;

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
     * Internal pairing state, e.g. ACTIVE or INACTIVE.
     */
    public function withPairState(string $pairState): self
    {
        $self = clone $this;
        $self['pairState'] = $pairState;

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
     * Owner of the resource.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * SIP username used for the registration.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
