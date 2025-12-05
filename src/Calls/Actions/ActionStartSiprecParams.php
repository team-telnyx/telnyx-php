<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartSiprecParams\SiprecTrack;
use Telnyx\Calls\Actions\ActionStartSiprecParams\SipTransport;
use Telnyx\Core\Attributes\Api;
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
 *   client_state?: string,
 *   connector_name?: string,
 *   include_metadata_custom_headers?: bool,
 *   secure?: bool,
 *   session_timeout_secs?: int,
 *   sip_transport?: SipTransport|value-of<SipTransport>,
 *   siprec_track?: SiprecTrack|value-of<SiprecTrack>,
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Name of configured SIPREC connector to be used.
     */
    #[Api(optional: true)]
    public ?string $connector_name;

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    #[Api(optional: true)]
    public ?bool $include_metadata_custom_headers;

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    #[Api(optional: true)]
    public ?bool $secure;

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    #[Api(optional: true)]
    public ?int $session_timeout_secs;

    /**
     * Specifies SIP transport protocol.
     *
     * @var value-of<SipTransport>|null $sip_transport
     */
    #[Api(enum: SipTransport::class, optional: true)]
    public ?string $sip_transport;

    /**
     * Specifies which track should be sent on siprec session.
     *
     * @var value-of<SiprecTrack>|null $siprec_track
     */
    #[Api(enum: SiprecTrack::class, optional: true)]
    public ?string $siprec_track;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SipTransport|value-of<SipTransport> $sip_transport
     * @param SiprecTrack|value-of<SiprecTrack> $siprec_track
     */
    public static function with(
        ?string $client_state = null,
        ?string $connector_name = null,
        ?bool $include_metadata_custom_headers = null,
        ?bool $secure = null,
        ?int $session_timeout_secs = null,
        SipTransport|string|null $sip_transport = null,
        SiprecTrack|string|null $siprec_track = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $connector_name && $obj['connector_name'] = $connector_name;
        null !== $include_metadata_custom_headers && $obj['include_metadata_custom_headers'] = $include_metadata_custom_headers;
        null !== $secure && $obj['secure'] = $secure;
        null !== $session_timeout_secs && $obj['session_timeout_secs'] = $session_timeout_secs;
        null !== $sip_transport && $obj['sip_transport'] = $sip_transport;
        null !== $siprec_track && $obj['siprec_track'] = $siprec_track;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Name of configured SIPREC connector to be used.
     */
    public function withConnectorName(string $connectorName): self
    {
        $obj = clone $this;
        $obj['connector_name'] = $connectorName;

        return $obj;
    }

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    public function withIncludeMetadataCustomHeaders(
        bool $includeMetadataCustomHeaders
    ): self {
        $obj = clone $this;
        $obj['include_metadata_custom_headers'] = $includeMetadataCustomHeaders;

        return $obj;
    }

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    public function withSecure(bool $secure): self
    {
        $obj = clone $this;
        $obj['secure'] = $secure;

        return $obj;
    }

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    public function withSessionTimeoutSecs(int $sessionTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['session_timeout_secs'] = $sessionTimeoutSecs;

        return $obj;
    }

    /**
     * Specifies SIP transport protocol.
     *
     * @param SipTransport|value-of<SipTransport> $sipTransport
     */
    public function withSipTransport(SipTransport|string $sipTransport): self
    {
        $obj = clone $this;
        $obj['sip_transport'] = $sipTransport;

        return $obj;
    }

    /**
     * Specifies which track should be sent on siprec session.
     *
     * @param SiprecTrack|value-of<SiprecTrack> $siprecTrack
     */
    public function withSiprecTrack(SiprecTrack|string $siprecTrack): self
    {
        $obj = clone $this;
        $obj['siprec_track'] = $siprecTrack;

        return $obj;
    }
}
