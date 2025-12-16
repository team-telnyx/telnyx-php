<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartSiprecParams\SiprecTrack;
use Telnyx\Calls\Actions\ActionStartSiprecParams\SipTransport;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start siprec session to configured in SIPREC connector SRS.
 *
 * **Expected Webhooks:**
 *
 * - `siprec.started`
 * - `siprec.stopped`
 * - `siprec.failed`
 *
 * @see Telnyx\Services\Calls\ActionsService::startSiprec()
 *
 * @phpstan-type ActionStartSiprecParamsShape = array{
 *   clientState?: string|null,
 *   connectorName?: string|null,
 *   includeMetadataCustomHeaders?: bool|null,
 *   secure?: bool|null,
 *   sessionTimeoutSecs?: int|null,
 *   sipTransport?: null|SipTransport|value-of<SipTransport>,
 *   siprecTrack?: null|SiprecTrack|value-of<SiprecTrack>,
 * }
 */
final class ActionStartSiprecParams implements BaseModel
{
    /** @use SdkModel<ActionStartSiprecParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Name of configured SIPREC connector to be used.
     */
    #[Optional('connector_name')]
    public ?string $connectorName;

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    #[Optional('include_metadata_custom_headers')]
    public ?bool $includeMetadataCustomHeaders;

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    #[Optional]
    public ?bool $secure;

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    #[Optional('session_timeout_secs')]
    public ?int $sessionTimeoutSecs;

    /**
     * Specifies SIP transport protocol.
     *
     * @var value-of<SipTransport>|null $sipTransport
     */
    #[Optional('sip_transport', enum: SipTransport::class)]
    public ?string $sipTransport;

    /**
     * Specifies which track should be sent on siprec session.
     *
     * @var value-of<SiprecTrack>|null $siprecTrack
     */
    #[Optional('siprec_track', enum: SiprecTrack::class)]
    public ?string $siprecTrack;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SipTransport|value-of<SipTransport> $sipTransport
     * @param SiprecTrack|value-of<SiprecTrack> $siprecTrack
     */
    public static function with(
        ?string $clientState = null,
        ?string $connectorName = null,
        ?bool $includeMetadataCustomHeaders = null,
        ?bool $secure = null,
        ?int $sessionTimeoutSecs = null,
        SipTransport|string|null $sipTransport = null,
        SiprecTrack|string|null $siprecTrack = null,
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectorName && $self['connectorName'] = $connectorName;
        null !== $includeMetadataCustomHeaders && $self['includeMetadataCustomHeaders'] = $includeMetadataCustomHeaders;
        null !== $secure && $self['secure'] = $secure;
        null !== $sessionTimeoutSecs && $self['sessionTimeoutSecs'] = $sessionTimeoutSecs;
        null !== $sipTransport && $self['sipTransport'] = $sipTransport;
        null !== $siprecTrack && $self['siprecTrack'] = $siprecTrack;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Name of configured SIPREC connector to be used.
     */
    public function withConnectorName(string $connectorName): self
    {
        $self = clone $this;
        $self['connectorName'] = $connectorName;

        return $self;
    }

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    public function withIncludeMetadataCustomHeaders(
        bool $includeMetadataCustomHeaders
    ): self {
        $self = clone $this;
        $self['includeMetadataCustomHeaders'] = $includeMetadataCustomHeaders;

        return $self;
    }

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    public function withSecure(bool $secure): self
    {
        $self = clone $this;
        $self['secure'] = $secure;

        return $self;
    }

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    public function withSessionTimeoutSecs(int $sessionTimeoutSecs): self
    {
        $self = clone $this;
        $self['sessionTimeoutSecs'] = $sessionTimeoutSecs;

        return $self;
    }

    /**
     * Specifies SIP transport protocol.
     *
     * @param SipTransport|value-of<SipTransport> $sipTransport
     */
    public function withSipTransport(SipTransport|string $sipTransport): self
    {
        $self = clone $this;
        $self['sipTransport'] = $sipTransport;

        return $self;
    }

    /**
     * Specifies which track should be sent on siprec session.
     *
     * @param SiprecTrack|value-of<SiprecTrack> $siprecTrack
     */
    public function withSiprecTrack(SiprecTrack|string $siprecTrack): self
    {
        $self = clone $this;
        $self['siprecTrack'] = $siprecTrack;

        return $self;
    }
}
