<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\SipTransport;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\Track;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CallSiprecJsonParams); // set properties as needed
 * $client->texml.accounts.calls->siprecJson(...$params->toArray());
 * ```
 * Starts siprec session with specified parameters for call idientified by call_sid.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.calls->siprecJson(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Calls->siprecJson
 *
 * @phpstan-type call_siprec_json_params = array{
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
    /** @use SdkModel<call_siprec_json_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * The name of the connector to use for the SIPREC session.
     */
    #[Api('ConnectorName', optional: true)]
    public ?string $connectorName;

    /**
     * When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     */
    #[Api('IncludeMetadataCustomHeaders', optional: true)]
    public ?bool $includeMetadataCustomHeaders;

    /**
     * Name of the SIPREC session. May be used to stop the SIPREC session from TeXML instruction.
     */
    #[Api('Name', optional: true)]
    public ?string $name;

    /**
     * Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     */
    #[Api('Secure', optional: true)]
    public ?bool $secure;

    /**
     * Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     */
    #[Api('SessionTimeoutSecs', optional: true)]
    public ?int $sessionTimeoutSecs;

    /**
     * Specifies SIP transport protocol.
     *
     * @var value-of<SipTransport>|null $sipTransport
     */
    #[Api('SipTransport', enum: SipTransport::class, optional: true)]
    public ?string $sipTransport;

    /**
     * URL destination for Telnyx to send status callback events to for the siprec session.
     */
    #[Api('StatusCallback', optional: true)]
    public ?string $statusCallback;

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @var value-of<StatusCallbackMethod>|null $statusCallbackMethod
     */
    #[Api(
        'StatusCallbackMethod',
        enum: StatusCallbackMethod::class,
        optional: true
    )]
    public ?string $statusCallbackMethod;

    /**
     * The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
     *
     * @var value-of<Track>|null $track
     */
    #[Api('Track', enum: Track::class, optional: true)]
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
        $obj = new self;

        $obj->accountSid = $accountSid;

        null !== $connectorName && $obj->connectorName = $connectorName;
        null !== $includeMetadataCustomHeaders && $obj->includeMetadataCustomHeaders = $includeMetadataCustomHeaders;
        null !== $name && $obj->name = $name;
        null !== $secure && $obj->secure = $secure;
        null !== $sessionTimeoutSecs && $obj->sessionTimeoutSecs = $sessionTimeoutSecs;
        null !== $sipTransport && $obj['sipTransport'] = $sipTransport;
        null !== $statusCallback && $obj->statusCallback = $statusCallback;
        null !== $statusCallbackMethod && $obj['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $track && $obj['track'] = $track;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }

    /**
     * The name of the connector to use for the SIPREC session.
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
     * Name of the SIPREC session. May be used to stop the SIPREC session from TeXML instruction.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

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
     * URL destination for Telnyx to send status callback events to for the siprec session.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj->statusCallback = $statusCallback;

        return $obj;
    }

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['statusCallbackMethod'] = $statusCallbackMethod;

        return $obj;
    }

    /**
     * The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(Track|string $track): self
    {
        $obj = clone $this;
        $obj['track'] = $track;

        return $obj;
    }
}
