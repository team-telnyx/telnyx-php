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
 *   account_sid: string,
 *   ConnectorName?: string,
 *   IncludeMetadataCustomHeaders?: bool,
 *   Name?: string,
 *   Secure?: bool,
 *   SessionTimeoutSecs?: int,
 *   SipTransport?: \Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\SipTransport|value-of<\Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\SipTransport>,
 *   StatusCallback?: string,
 *   StatusCallbackMethod?: \Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod>,
 *   Track?: \Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\Track|value-of<\Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\Track>,
 * }
 */
final class CallSiprecJsonParams implements BaseModel
{
    /** @use SdkModel<CallSiprecJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account_sid;

    /**
     * The name of the connector to use for the SIPREC session.
     */
    #[Optional]
    public ?string $ConnectorName;

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    #[Optional]
    public ?bool $IncludeMetadataCustomHeaders;

    /**
     * Name of the SIPREC session. May be used to stop the SIPREC session from TeXML instruction.
     */
    #[Optional]
    public ?string $Name;

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    #[Optional]
    public ?bool $Secure;

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    #[Optional]
    public ?int $SessionTimeoutSecs;

    /**
     * Specifies SIP transport protocol.
     *
     * @var value-of<SipTransport>|null $SipTransport
     */
    #[Optional(
        enum: SipTransport::class
    )]
    public ?string $SipTransport;

    /**
     * URL destination for Telnyx to send status callback events to for the siprec session.
     */
    #[Optional]
    public ?string $StatusCallback;

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @var value-of<StatusCallbackMethod>|null $StatusCallbackMethod
     */
    #[Optional(
        enum: StatusCallbackMethod::class,
    )]
    public ?string $StatusCallbackMethod;

    /**
     * The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
     *
     * @var value-of<Track>|null $Track
     */
    #[Optional(
        enum: Track::class
    )]
    public ?string $Track;

    /**
     * `new CallSiprecJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallSiprecJsonParams::with(account_sid: ...)
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
     * @param SipTransport|value-of<SipTransport> $SipTransport
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $StatusCallbackMethod
     * @param Track|value-of<Track> $Track
     */
    public static function with(
        string $account_sid,
        ?string $ConnectorName = null,
        ?bool $IncludeMetadataCustomHeaders = null,
        ?string $Name = null,
        ?bool $Secure = null,
        ?int $SessionTimeoutSecs = null,
        SipTransport|string|null $SipTransport = null,
        ?string $StatusCallback = null,
        StatusCallbackMethod|string|null $StatusCallbackMethod = null,
        Track|string|null $Track = null,
    ): self {
        $obj = new self;

        $obj['account_sid'] = $account_sid;

        null !== $ConnectorName && $obj['ConnectorName'] = $ConnectorName;
        null !== $IncludeMetadataCustomHeaders && $obj['IncludeMetadataCustomHeaders'] = $IncludeMetadataCustomHeaders;
        null !== $Name && $obj['Name'] = $Name;
        null !== $Secure && $obj['Secure'] = $Secure;
        null !== $SessionTimeoutSecs && $obj['SessionTimeoutSecs'] = $SessionTimeoutSecs;
        null !== $SipTransport && $obj['SipTransport'] = $SipTransport;
        null !== $StatusCallback && $obj['StatusCallback'] = $StatusCallback;
        null !== $StatusCallbackMethod && $obj['StatusCallbackMethod'] = $StatusCallbackMethod;
        null !== $Track && $obj['Track'] = $Track;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    /**
     * The name of the connector to use for the SIPREC session.
     */
    public function withConnectorName(string $connectorName): self
    {
        $obj = clone $this;
        $obj['ConnectorName'] = $connectorName;

        return $obj;
    }

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    public function withIncludeMetadataCustomHeaders(
        bool $includeMetadataCustomHeaders
    ): self {
        $obj = clone $this;
        $obj['IncludeMetadataCustomHeaders'] = $includeMetadataCustomHeaders;

        return $obj;
    }

    /**
     * Name of the SIPREC session. May be used to stop the SIPREC session from TeXML instruction.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['Name'] = $name;

        return $obj;
    }

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    public function withSecure(bool $secure): self
    {
        $obj = clone $this;
        $obj['Secure'] = $secure;

        return $obj;
    }

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    public function withSessionTimeoutSecs(int $sessionTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['SessionTimeoutSecs'] = $sessionTimeoutSecs;

        return $obj;
    }

    /**
     * Specifies SIP transport protocol.
     *
     * @param SipTransport|value-of<SipTransport> $sipTransport
     */
    public function withSipTransport(
        SipTransport|string $sipTransport,
    ): self {
        $obj = clone $this;
        $obj['SipTransport'] = $sipTransport;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the siprec session.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj['StatusCallback'] = $statusCallback;

        return $obj;
    }

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['StatusCallbackMethod'] = $statusCallbackMethod;

        return $obj;
    }

    /**
     * The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(
        Track|string $track
    ): self {
        $obj = clone $this;
        $obj['Track'] = $track;

        return $obj;
    }
}
