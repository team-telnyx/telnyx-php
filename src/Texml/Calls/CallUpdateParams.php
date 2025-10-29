<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Calls\CallUpdateParams\StatusCallbackMethod;

/**
 * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
 *
 * @see Telnyx\Texml\Calls->update
 *
 * @phpstan-type CallUpdateParamsShape = array{
 *   fallbackMethod?: FallbackMethod|value-of<FallbackMethod>,
 *   fallbackURL?: string,
 *   method?: Method|value-of<Method>,
 *   status?: string,
 *   statusCallback?: string,
 *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
 *   texml?: string,
 *   url?: string,
 * }
 */
final class CallUpdateParams implements BaseModel
{
    /** @use SdkModel<CallUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * HTTP request type used for `FallbackUrl`.
     *
     * @var value-of<FallbackMethod>|null $fallbackMethod
     */
    #[Api('FallbackMethod', enum: FallbackMethod::class, optional: true)]
    public ?string $fallbackMethod;

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding.
     */
    #[Api('FallbackUrl', optional: true)]
    public ?string $fallbackURL;

    /**
     * HTTP request type used for `Url`.
     *
     * @var value-of<Method>|null $method
     */
    #[Api('Method', enum: Method::class, optional: true)]
    public ?string $method;

    /**
     * The value to set the call status to. Setting the status to completed ends the call.
     */
    #[Api('Status', optional: true)]
    public ?string $status;

    /**
     * URL destination for Telnyx to send status callback events to for the call.
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
     * TeXML to replace the current one with.
     */
    #[Api('Texml', optional: true)]
    public ?string $texml;

    /**
     * The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow.
     */
    #[Api('Url', optional: true)]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FallbackMethod|value-of<FallbackMethod> $fallbackMethod
     * @param Method|value-of<Method> $method
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public static function with(
        FallbackMethod|string|null $fallbackMethod = null,
        ?string $fallbackURL = null,
        Method|string|null $method = null,
        ?string $status = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        ?string $texml = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $fallbackMethod && $obj['fallbackMethod'] = $fallbackMethod;
        null !== $fallbackURL && $obj->fallbackURL = $fallbackURL;
        null !== $method && $obj['method'] = $method;
        null !== $status && $obj->status = $status;
        null !== $statusCallback && $obj->statusCallback = $statusCallback;
        null !== $statusCallbackMethod && $obj['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $texml && $obj->texml = $texml;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    /**
     * HTTP request type used for `FallbackUrl`.
     *
     * @param FallbackMethod|value-of<FallbackMethod> $fallbackMethod
     */
    public function withFallbackMethod(
        FallbackMethod|string $fallbackMethod
    ): self {
        $obj = clone $this;
        $obj['fallbackMethod'] = $fallbackMethod;

        return $obj;
    }

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $obj = clone $this;
        $obj->fallbackURL = $fallbackURL;

        return $obj;
    }

    /**
     * HTTP request type used for `Url`.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $obj = clone $this;
        $obj['method'] = $method;

        return $obj;
    }

    /**
     * The value to set the call status to. Setting the status to completed ends the call.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
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
     * TeXML to replace the current one with.
     */
    public function withTexml(string $texml): self
    {
        $obj = clone $this;
        $obj->texml = $texml;

        return $obj;
    }

    /**
     * The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
