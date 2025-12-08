<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Calls\CallUpdateParams\StatusCallbackMethod;

/**
 * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
 *
 * @see Telnyx\Services\Texml\CallsService::update()
 *
 * @phpstan-type CallUpdateParamsShape = array{
 *   FallbackMethod?: \Telnyx\Texml\Calls\CallUpdateParams\FallbackMethod|value-of<\Telnyx\Texml\Calls\CallUpdateParams\FallbackMethod>,
 *   FallbackUrl?: string,
 *   Method?: \Telnyx\Texml\Calls\CallUpdateParams\Method|value-of<\Telnyx\Texml\Calls\CallUpdateParams\Method>,
 *   Status?: string,
 *   StatusCallback?: string,
 *   StatusCallbackMethod?: \Telnyx\Texml\Calls\CallUpdateParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Calls\CallUpdateParams\StatusCallbackMethod>,
 *   Texml?: string,
 *   Url?: string,
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
     * @var value-of<FallbackMethod>|null $FallbackMethod
     */
    #[Optional(enum: FallbackMethod::class)]
    public ?string $FallbackMethod;

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding.
     */
    #[Optional]
    public ?string $FallbackUrl;

    /**
     * HTTP request type used for `Url`.
     *
     * @var value-of<Method>|null $Method
     */
    #[Optional(enum: Method::class)]
    public ?string $Method;

    /**
     * The value to set the call status to. Setting the status to completed ends the call.
     */
    #[Optional]
    public ?string $Status;

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    #[Optional]
    public ?string $StatusCallback;

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @var value-of<StatusCallbackMethod>|null $StatusCallbackMethod
     */
    #[Optional(
        enum: StatusCallbackMethod::class
    )]
    public ?string $StatusCallbackMethod;

    /**
     * TeXML to replace the current one with.
     */
    #[Optional]
    public ?string $Texml;

    /**
     * The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow.
     */
    #[Optional]
    public ?string $Url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FallbackMethod|value-of<FallbackMethod> $FallbackMethod
     * @param Method|value-of<Method> $Method
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $StatusCallbackMethod
     */
    public static function with(
        FallbackMethod|string|null $FallbackMethod = null,
        ?string $FallbackUrl = null,
        Method|string|null $Method = null,
        ?string $Status = null,
        ?string $StatusCallback = null,
        StatusCallbackMethod|string|null $StatusCallbackMethod = null,
        ?string $Texml = null,
        ?string $Url = null,
    ): self {
        $obj = new self;

        null !== $FallbackMethod && $obj['FallbackMethod'] = $FallbackMethod;
        null !== $FallbackUrl && $obj['FallbackUrl'] = $FallbackUrl;
        null !== $Method && $obj['Method'] = $Method;
        null !== $Status && $obj['Status'] = $Status;
        null !== $StatusCallback && $obj['StatusCallback'] = $StatusCallback;
        null !== $StatusCallbackMethod && $obj['StatusCallbackMethod'] = $StatusCallbackMethod;
        null !== $Texml && $obj['Texml'] = $Texml;
        null !== $Url && $obj['Url'] = $Url;

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
        $obj['FallbackMethod'] = $fallbackMethod;

        return $obj;
    }

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $obj = clone $this;
        $obj['FallbackUrl'] = $fallbackURL;

        return $obj;
    }

    /**
     * HTTP request type used for `Url`.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(
        Method|string $method
    ): self {
        $obj = clone $this;
        $obj['Method'] = $method;

        return $obj;
    }

    /**
     * The value to set the call status to. Setting the status to completed ends the call.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['Status'] = $status;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
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
     * TeXML to replace the current one with.
     */
    public function withTexml(string $texml): self
    {
        $obj = clone $this;
        $obj['Texml'] = $texml;

        return $obj;
    }

    /**
     * The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['Url'] = $url;

        return $obj;
    }
}
