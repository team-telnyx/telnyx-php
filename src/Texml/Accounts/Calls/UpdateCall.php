<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\UpdateCall\FallbackMethod;
use Telnyx\Texml\Accounts\Calls\UpdateCall\Method;
use Telnyx\Texml\Accounts\Calls\UpdateCall\StatusCallbackMethod;

/**
 * @phpstan-type UpdateCallShape = array{
 *   fallbackMethod?: value-of<FallbackMethod>|null,
 *   fallbackURL?: string|null,
 *   method?: value-of<Method>|null,
 *   status?: string|null,
 *   statusCallback?: string|null,
 *   statusCallbackMethod?: value-of<StatusCallbackMethod>|null,
 *   texml?: string|null,
 *   url?: string|null,
 * }
 */
final class UpdateCall implements BaseModel
{
    /** @use SdkModel<UpdateCallShape> */
    use SdkModel;

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
        $self = new self;

        null !== $fallbackMethod && $self['fallbackMethod'] = $fallbackMethod;
        null !== $fallbackURL && $self['fallbackURL'] = $fallbackURL;
        null !== $method && $self['method'] = $method;
        null !== $status && $self['status'] = $status;
        null !== $statusCallback && $self['statusCallback'] = $statusCallback;
        null !== $statusCallbackMethod && $self['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $texml && $self['texml'] = $texml;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * HTTP request type used for `FallbackUrl`.
     *
     * @param FallbackMethod|value-of<FallbackMethod> $fallbackMethod
     */
    public function withFallbackMethod(
        FallbackMethod|string $fallbackMethod
    ): self {
        $self = clone $this;
        $self['fallbackMethod'] = $fallbackMethod;

        return $self;
    }

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $self = clone $this;
        $self['fallbackURL'] = $fallbackURL;

        return $self;
    }

    /**
     * HTTP request type used for `Url`.
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
     * The value to set the call status to. Setting the status to completed ends the call.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
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
     * TeXML to replace the current one with.
     */
    public function withTexml(string $texml): self
    {
        $self = clone $this;
        $self['texml'] = $texml;

        return $self;
    }

    /**
     * The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
