<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\ActionResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Null unless an execution failure is recorded. Action failures (policy_denied, stale_observation, stale_ref, navigation_blocked, timeout, execution_lost, result_too_large) are returned on the action resource with HTTP 200. An unknown action with execution_lost has retryable=false; inspect session state and reconcile possible effects before any new action. Separately, a request may return HTTP 503 with a top-level execution_lost error and retryable=true; that is not proof of safe re-execution.
 *
 * @phpstan-type ErrorShape = array{code: string, retryable: bool}
 */
final class Error implements BaseModel
{
    /** @use SdkModel<ErrorShape> */
    use SdkModel;

    #[Required]
    public string $code;

    #[Required]
    public bool $retryable;

    /**
     * `new Error()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Error::with(code: ..., retryable: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Error)->withCode(...)->withRetryable(...)
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
     */
    public static function with(string $code, bool $retryable): self
    {
        $self = new self;

        $self['code'] = $code;
        $self['retryable'] = $retryable;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withRetryable(bool $retryable): self
    {
        $self = clone $this;
        $self['retryable'] = $retryable;

        return $self;
    }
}
