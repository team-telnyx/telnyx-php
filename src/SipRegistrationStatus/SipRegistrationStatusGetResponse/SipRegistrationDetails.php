<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Detailed registration information reported by the registrar.
 *
 * @phpstan-type SipRegistrationDetailsShape = array{
 *   authRetries?: int|null,
 *   expires?: int|null,
 *   failures?: int|null,
 *   nextActionAt?: int|null,
 *   sipUriUserHost?: string|null,
 *   uptime?: int|null,
 * }
 */
final class SipRegistrationDetails implements BaseModel
{
    /** @use SdkModel<SipRegistrationDetailsShape> */
    use SdkModel;

    /**
     * Number of authentication retries on the last attempt.
     */
    #[Optional('auth_retries')]
    public ?int $authRetries;

    /**
     * Unix timestamp when the current registration expires.
     */
    #[Optional]
    public ?int $expires;

    /**
     * Count of consecutive registration failures.
     */
    #[Optional]
    public ?int $failures;

    /**
     * Unix timestamp of the next scheduled registration action.
     */
    #[Optional('next_action_at')]
    public ?int $nextActionAt;

    /**
     * SIP URI user@host of the registered contact.
     */
    #[Optional]
    public ?string $sipUriUserHost;

    /**
     * Registration uptime reported by the registrar.
     */
    #[Optional]
    public ?int $uptime;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $authRetries = null,
        ?int $expires = null,
        ?int $failures = null,
        ?int $nextActionAt = null,
        ?string $sipUriUserHost = null,
        ?int $uptime = null,
    ): self {
        $self = new self;

        null !== $authRetries && $self['authRetries'] = $authRetries;
        null !== $expires && $self['expires'] = $expires;
        null !== $failures && $self['failures'] = $failures;
        null !== $nextActionAt && $self['nextActionAt'] = $nextActionAt;
        null !== $sipUriUserHost && $self['sipUriUserHost'] = $sipUriUserHost;
        null !== $uptime && $self['uptime'] = $uptime;

        return $self;
    }

    /**
     * Number of authentication retries on the last attempt.
     */
    public function withAuthRetries(int $authRetries): self
    {
        $self = clone $this;
        $self['authRetries'] = $authRetries;

        return $self;
    }

    /**
     * Unix timestamp when the current registration expires.
     */
    public function withExpires(int $expires): self
    {
        $self = clone $this;
        $self['expires'] = $expires;

        return $self;
    }

    /**
     * Count of consecutive registration failures.
     */
    public function withFailures(int $failures): self
    {
        $self = clone $this;
        $self['failures'] = $failures;

        return $self;
    }

    /**
     * Unix timestamp of the next scheduled registration action.
     */
    public function withNextActionAt(int $nextActionAt): self
    {
        $self = clone $this;
        $self['nextActionAt'] = $nextActionAt;

        return $self;
    }

    /**
     * SIP URI user@host of the registered contact.
     */
    public function withSipUriUserHost(string $sipUriUserHost): self
    {
        $self = clone $this;
        $self['sipUriUserHost'] = $sipUriUserHost;

        return $self;
    }

    /**
     * Registration uptime reported by the registrar.
     */
    public function withUptime(int $uptime): self
    {
        $self = clone $this;
        $self['uptime'] = $uptime;

        return $self;
    }
}
