<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\StatusCallbackMethod;

/**
 * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
 *
 * @see Telnyx\Services\Texml\Accounts\CallsService::update()
 *
 * @phpstan-type CallUpdateParamsShape = array{
 *   accountSid: string,
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

    #[Required]
    public string $accountSid;

    /**
     * HTTP request type used for `FallbackUrl`.
     *
     * @var value-of<FallbackMethod>|null $fallbackMethod
     */
    #[Optional('FallbackMethod', enum: FallbackMethod::class)]
    public ?string $fallbackMethod;

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding.
     */
    #[Optional('FallbackUrl')]
    public ?string $fallbackURL;

    /**
     * HTTP request type used for `Url`.
     *
     * @var value-of<Method>|null $method
     */
    #[Optional('Method', enum: Method::class)]
    public ?string $method;

    /**
     * The value to set the call status to. Setting the status to completed ends the call.
     */
    #[Optional('Status')]
    public ?string $status;

    /**
     * URL destination for Telnyx to send status callback events to for the call.
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
     * TeXML to replace the current one with.
     */
    #[Optional('Texml')]
    public ?string $texml;

    /**
     * The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow.
     */
    #[Optional('Url')]
    public ?string $url;

    /**
     * `new CallUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallUpdateParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallUpdateParams)->withAccountSid(...)
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
     * @param FallbackMethod|value-of<FallbackMethod> $fallbackMethod
     * @param Method|value-of<Method> $method
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public static function with(
        string $accountSid,
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

        $obj['accountSid'] = $accountSid;

        null !== $fallbackMethod && $obj['fallbackMethod'] = $fallbackMethod;
        null !== $fallbackURL && $obj['fallbackURL'] = $fallbackURL;
        null !== $method && $obj['method'] = $method;
        null !== $status && $obj['status'] = $status;
        null !== $statusCallback && $obj['statusCallback'] = $statusCallback;
        null !== $statusCallbackMethod && $obj['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $texml && $obj['texml'] = $texml;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['accountSid'] = $accountSid;

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
        $obj['fallbackURL'] = $fallbackURL;

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
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj['statusCallback'] = $statusCallback;

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
        $obj['texml'] = $texml;

        return $obj;
    }

    /**
     * The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
