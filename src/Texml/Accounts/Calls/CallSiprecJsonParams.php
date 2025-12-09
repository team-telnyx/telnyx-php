<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\SipTransport;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\Track;

/**
 * Starts siprec session with specified parameters for call idientified by call_sid.
 *
 * @see Telnyx\Services\Texml\Accounts\CallsService::siprecJson()
 *
 * @phpstan-type CallSiprecJsonParamsShape = array{
 *   accountSid: string,
 *   connectorName?: string,
 *   includeMetadataCustomHeaders?: bool,
 *   name?: string,
 *   secure?: bool,
 *   sessionTimeoutSecs?: int,
 *   sipTransport?: SipTransport|value-of<SipTransport>,
 *   statusCallback?: string,
 *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
 *   track?: Track|value-of<Track>,
 * }
 */
final class CallSiprecJsonParams implements BaseModel
{
    /** @use SdkModel<CallSiprecJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    /**
     * The name of the connector to use for the SIPREC session.
     */
    #[Optional('ConnectorName')]
    public ?string $connectorName;

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    #[Optional('IncludeMetadataCustomHeaders')]
    public ?bool $includeMetadataCustomHeaders;

    /**
     * Name of the SIPREC session. May be used to stop the SIPREC session from TeXML instruction.
     */
    #[Optional('Name')]
    public ?string $name;

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    #[Optional('Secure')]
    public ?bool $secure;

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    #[Optional('SessionTimeoutSecs')]
    public ?int $sessionTimeoutSecs;

    /**
     * Specifies SIP transport protocol.
     *
     * @var value-of<SipTransport>|null $sipTransport
     */
    #[Optional('SipTransport', enum: SipTransport::class)]
    public ?string $sipTransport;

    /**
     * URL destination for Telnyx to send status callback events to for the siprec session.
     */
    #[Optional('StatusCallback')]
    public ?string $statusCallback;

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @var value-of<StatusCallbackMethod>|null $statusCallbackMethod
     */
    #[Optional('StatusCallbackMethod', enum: StatusCallbackMethod::class)]
    public ?string $statusCallbackMethod;

    /**
     * The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
     *
     * @var value-of<Track>|null $track
     */
    #[Optional('Track', enum: Track::class)]
    public ?string $track;

    /**
     * `new CallSiprecJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallSiprecJsonParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallSiprecJsonParams)->withAccountSid(...)
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
     * @param SipTransport|value-of<SipTransport> $sipTransport
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     * @param Track|value-of<Track> $track
     */
    public static function with(
        string $accountSid,
        ?string $connectorName = null,
        ?bool $includeMetadataCustomHeaders = null,
        ?string $name = null,
        ?bool $secure = null,
        ?int $sessionTimeoutSecs = null,
        SipTransport|string|null $sipTransport = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        Track|string|null $track = null,
    ): self {
        $self = new self;

        $self['accountSid'] = $accountSid;

        null !== $connectorName && $self['connectorName'] = $connectorName;
        null !== $includeMetadataCustomHeaders && $self['includeMetadataCustomHeaders'] = $includeMetadataCustomHeaders;
        null !== $name && $self['name'] = $name;
        null !== $secure && $self['secure'] = $secure;
        null !== $sessionTimeoutSecs && $self['sessionTimeoutSecs'] = $sessionTimeoutSecs;
        null !== $sipTransport && $self['sipTransport'] = $sipTransport;
        null !== $statusCallback && $self['statusCallback'] = $statusCallback;
        null !== $statusCallbackMethod && $self['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $track && $self['track'] = $track;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    /**
     * The name of the connector to use for the SIPREC session.
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
     * Name of the SIPREC session. May be used to stop the SIPREC session from TeXML instruction.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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
     * URL destination for Telnyx to send status callback events to for the siprec session.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $self = clone $this;
        $self['statusCallback'] = $statusCallback;

        return $self;
    }

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $self = clone $this;
        $self['statusCallbackMethod'] = $statusCallbackMethod;

        return $self;
    }

    /**
     * The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(Track|string $track): self
    {
        $self = clone $this;
        $self['track'] = $track;

        return $self;
    }
}
