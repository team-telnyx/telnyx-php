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
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionStartSiprecParams); // set properties as needed
 * $client->calls.actions->startSiprec(...$params->toArray());
 * ```
 * Start siprec session to configured in SIPREC connector SRS.
 *
 * **Expected Webhooks:**
 *
 * - `siprec.started`
 * - `siprec.stopped`
 * - `siprec.failed`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->startSiprec(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->startSiprec
 *
 * @phpstan-type action_start_siprec_params = array{
 *   clientState?: string,
 *   connectorName?: string,
 *   includeMetadataCustomHeaders?: bool,
 *   secure?: bool,
 *   sessionTimeoutSecs?: int,
 *   sipTransport?: SipTransport|value-of<SipTransport>,
 *   siprecTrack?: SiprecTrack|value-of<SiprecTrack>,
 * }
 */
final class ActionStartSiprecParams implements BaseModel
{
    /** @use SdkModel<action_start_siprec_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Name of configured SIPREC connector to be used.
     */
    #[Api('connector_name', optional: true)]
    public ?string $connectorName;

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    #[Api('include_metadata_custom_headers', optional: true)]
    public ?bool $includeMetadataCustomHeaders;

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    #[Api(optional: true)]
    public ?bool $secure;

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    #[Api('session_timeout_secs', optional: true)]
    public ?int $sessionTimeoutSecs;

    /**
     * Specifies SIP transport protocol.
     *
     * @var value-of<SipTransport>|null $sipTransport
     */
    #[Api('sip_transport', enum: SipTransport::class, optional: true)]
    public ?string $sipTransport;

    /**
     * Specifies which track should be sent on siprec session.
     *
     * @var value-of<SiprecTrack>|null $siprecTrack
     */
    #[Api('siprec_track', enum: SiprecTrack::class, optional: true)]
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
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectorName && $obj->connectorName = $connectorName;
        null !== $includeMetadataCustomHeaders && $obj->includeMetadataCustomHeaders = $includeMetadataCustomHeaders;
        null !== $secure && $obj->secure = $secure;
        null !== $sessionTimeoutSecs && $obj->sessionTimeoutSecs = $sessionTimeoutSecs;
        null !== $sipTransport && $obj['sipTransport'] = $sipTransport;
        null !== $siprecTrack && $obj['siprecTrack'] = $siprecTrack;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Name of configured SIPREC connector to be used.
     */
    public function withConnectorName(string $connectorName): self
    {
        $obj = clone $this;
        $obj->connectorName = $connectorName;

        return $obj;
    }

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    public function withIncludeMetadataCustomHeaders(
        bool $includeMetadataCustomHeaders
    ): self {
        $obj = clone $this;
        $obj->includeMetadataCustomHeaders = $includeMetadataCustomHeaders;

        return $obj;
    }

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    public function withSecure(bool $secure): self
    {
        $obj = clone $this;
        $obj->secure = $secure;

        return $obj;
    }

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    public function withSessionTimeoutSecs(int $sessionTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->sessionTimeoutSecs = $sessionTimeoutSecs;

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
        $obj['sipTransport'] = $sipTransport;

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
        $obj['siprecTrack'] = $siprecTrack;

        return $obj;
    }
}
