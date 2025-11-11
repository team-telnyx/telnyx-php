<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\StatusCallbackMethod;

/**
 * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
 *
 * @see Telnyx\Texml\Accounts\Calls->update
 *
 * @phpstan-type CallUpdateParamsShape = array{
 *   account_sid: string,
 *   FallbackMethod?: \Telnyx\Texml\Accounts\Calls\CallUpdateParams\FallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\CallUpdateParams\FallbackMethod>,
 *   FallbackUrl?: string,
 *   Method?: \Telnyx\Texml\Accounts\Calls\CallUpdateParams\Method|value-of<\Telnyx\Texml\Accounts\Calls\CallUpdateParams\Method>,
 *   Status?: string,
 *   StatusCallback?: string,
 *   StatusCallbackMethod?: \Telnyx\Texml\Accounts\Calls\CallUpdateParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\CallUpdateParams\StatusCallbackMethod>,
 *   Texml?: string,
 *   Url?: string,
 * }
 */
final class CallUpdateParams implements BaseModel
{
    /** @use SdkModel<CallUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $account_sid;

    /**
     * HTTP request type used for `FallbackUrl`.
     *
     * @var value-of<FallbackMethod>|null $FallbackMethod
     */
    #[Api(
        enum: FallbackMethod::class,
        optional: true,
    )]
    public ?string $FallbackMethod;

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding.
     */
    #[Api(optional: true)]
    public ?string $FallbackUrl;

    /**
     * HTTP request type used for `Url`.
     *
     * @var value-of<Method>|null $Method
     */
    #[Api(
        enum: Method::class,
        optional: true,
    )]
    public ?string $Method;

    /**
     * The value to set the call status to. Setting the status to completed ends the call.
     */
    #[Api(optional: true)]
    public ?string $Status;

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    #[Api(optional: true)]
    public ?string $StatusCallback;

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @var value-of<StatusCallbackMethod>|null $StatusCallbackMethod
     */
    #[Api(
        enum: StatusCallbackMethod::class,
        optional: true,
    )]
    public ?string $StatusCallbackMethod;

    /**
     * TeXML to replace the current one with.
     */
    #[Api(optional: true)]
    public ?string $Texml;

    /**
     * The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow.
     */
    #[Api(optional: true)]
    public ?string $Url;

    /**
     * `new CallUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallUpdateParams::with(account_sid: ...)
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
     * @param FallbackMethod|value-of<FallbackMethod> $FallbackMethod
     * @param Method|value-of<Method> $Method
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $StatusCallbackMethod
     */
    public static function with(
        string $account_sid,
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

        $obj->account_sid = $account_sid;

        null !== $FallbackMethod && $obj['FallbackMethod'] = $FallbackMethod;
        null !== $FallbackUrl && $obj->FallbackUrl = $FallbackUrl;
        null !== $Method && $obj['Method'] = $Method;
        null !== $Status && $obj->Status = $Status;
        null !== $StatusCallback && $obj->StatusCallback = $StatusCallback;
        null !== $StatusCallbackMethod && $obj['StatusCallbackMethod'] = $StatusCallbackMethod;
        null !== $Texml && $obj->Texml = $Texml;
        null !== $Url && $obj->Url = $Url;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->account_sid = $accountSid;

        return $obj;
    }

    /**
     * HTTP request type used for `FallbackUrl`.
     *
     * @param FallbackMethod|value-of<FallbackMethod> $fallbackMethod
     */
    public function withFallbackMethod(
        FallbackMethod|string $fallbackMethod,
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
        $obj->FallbackUrl = $fallbackURL;

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
        $obj->Status = $status;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj->StatusCallback = $statusCallback;

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
        $obj->Texml = $texml;

        return $obj;
    }

    /**
     * The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->Url = $url;

        return $obj;
    }
}
