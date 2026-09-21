<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Calls\CallCreateParams\Method;

/**
 * Initiate an outbound TeXML call using a TeXML application connection ID, not an account SID. Request parameter names are case-sensitive. From and To are required; Texml supplies inline instructions and Url overrides the application XML request URL. When neither is supplied, the application configuration supplies the instructions. The response is a flat call object without a data wrapper.
 *
 * @see Telnyx\Services\Texml\CallsService::create()
 *
 * @phpstan-type CallCreateParamsShape = array{
 *   from: string,
 *   to: string,
 *   method?: null|Method|value-of<Method>,
 *   texml?: string|null,
 *   url?: string|null,
 * }
 */
final class CallCreateParams implements BaseModel
{
    /** @use SdkModel<CallCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The E.164-formatted phone number or SIP URI to present as the caller.
     */
    #[Required('From')]
    public string $from;

    /**
     * The E.164-formatted phone number or SIP URI to call.
     */
    #[Required('To')]
    public string $to;

    /**
     * HTTP method used to retrieve TeXML instructions from Url.
     *
     * @var value-of<Method>|null $method
     */
    #[Optional('Method', enum: Method::class)]
    public ?string $method;

    /**
     * Inline TeXML instructions to execute when the call is answered.
     */
    #[Optional('Texml')]
    public ?string $texml;

    /**
     * The URL from which to retrieve TeXML instructions. Overrides the TeXML application XML request URL.
     */
    #[Optional('Url')]
    public ?string $url;

    /**
     * `new CallCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallCreateParams::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallCreateParams)->withFrom(...)->withTo(...)
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
     * @param Method|value-of<Method>|null $method
     */
    public static function with(
        string $from,
        string $to,
        Method|string|null $method = null,
        ?string $texml = null,
        ?string $url = null,
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;

        null !== $method && $self['method'] = $method;
        null !== $texml && $self['texml'] = $texml;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * The E.164-formatted phone number or SIP URI to present as the caller.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The E.164-formatted phone number or SIP URI to call.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * HTTP method used to retrieve TeXML instructions from Url.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $self = clone $this;
        $self['method'] = $method;

        return $self;
    }

    /**
     * Inline TeXML instructions to execute when the call is answered.
     */
    public function withTexml(string $texml): self
    {
        $self = clone $this;
        $self['texml'] = $texml;

        return $self;
    }

    /**
     * The URL from which to retrieve TeXML instructions. Overrides the TeXML application XML request URL.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
