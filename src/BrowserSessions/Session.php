<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions;

use Telnyx\BrowserSessions\Session\Limits;
use Telnyx\BrowserSessions\Session\Policy;
use Telnyx\BrowserSessions\Session\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LimitsShape from \Telnyx\BrowserSessions\Session\Limits
 * @phpstan-import-type PolicyShape from \Telnyx\BrowserSessions\Session\Policy
 *
 * @phpstan-type SessionShape = array{
 *   id: string,
 *   closedAt: \DateTimeInterface|null,
 *   createdAt: \DateTimeInterface,
 *   expiresAt: \DateTimeInterface|null,
 *   failureReason: string|null,
 *   lastActivityAt: \DateTimeInterface|null,
 *   limits: Limits|LimitsShape,
 *   metadata: mixed,
 *   policy: Policy|PolicyShape,
 *   readyAt: \DateTimeInterface|null,
 *   status: Status|value-of<Status>,
 * }
 */
final class Session implements BaseModel
{
    /** @use SdkModel<SessionShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('closed_at')]
    public ?\DateTimeInterface $closedAt;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    #[Required('failure_reason')]
    public ?string $failureReason;

    #[Required('last_activity_at')]
    public ?\DateTimeInterface $lastActivityAt;

    #[Required]
    public Limits $limits;

    #[Required]
    public mixed $metadata;

    #[Required]
    public Policy $policy;

    #[Required('ready_at')]
    public ?\DateTimeInterface $readyAt;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * `new Session()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Session::with(
     *   id: ...,
     *   closedAt: ...,
     *   createdAt: ...,
     *   expiresAt: ...,
     *   failureReason: ...,
     *   lastActivityAt: ...,
     *   limits: ...,
     *   metadata: ...,
     *   policy: ...,
     *   readyAt: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Session)
     *   ->withID(...)
     *   ->withClosedAt(...)
     *   ->withCreatedAt(...)
     *   ->withExpiresAt(...)
     *   ->withFailureReason(...)
     *   ->withLastActivityAt(...)
     *   ->withLimits(...)
     *   ->withMetadata(...)
     *   ->withPolicy(...)
     *   ->withReadyAt(...)
     *   ->withStatus(...)
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
     * @param Limits|LimitsShape $limits
     * @param Policy|PolicyShape $policy
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        ?\DateTimeInterface $closedAt,
        \DateTimeInterface $createdAt,
        ?\DateTimeInterface $expiresAt,
        ?string $failureReason,
        ?\DateTimeInterface $lastActivityAt,
        Limits|array $limits,
        mixed $metadata,
        Policy|array $policy,
        ?\DateTimeInterface $readyAt,
        Status|string $status,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['closedAt'] = $closedAt;
        $self['createdAt'] = $createdAt;
        $self['expiresAt'] = $expiresAt;
        $self['failureReason'] = $failureReason;
        $self['lastActivityAt'] = $lastActivityAt;
        $self['limits'] = $limits;
        $self['metadata'] = $metadata;
        $self['policy'] = $policy;
        $self['readyAt'] = $readyAt;
        $self['status'] = $status;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withClosedAt(?\DateTimeInterface $closedAt): self
    {
        $self = clone $this;
        $self['closedAt'] = $closedAt;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withExpiresAt(?\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withFailureReason(?string $failureReason): self
    {
        $self = clone $this;
        $self['failureReason'] = $failureReason;

        return $self;
    }

    public function withLastActivityAt(
        ?\DateTimeInterface $lastActivityAt
    ): self {
        $self = clone $this;
        $self['lastActivityAt'] = $lastActivityAt;

        return $self;
    }

    /**
     * @param Limits|LimitsShape $limits
     */
    public function withLimits(Limits|array $limits): self
    {
        $self = clone $this;
        $self['limits'] = $limits;

        return $self;
    }

    public function withMetadata(mixed $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * @param Policy|PolicyShape $policy
     */
    public function withPolicy(Policy|array $policy): self
    {
        $self = clone $this;
        $self['policy'] = $policy;

        return $self;
    }

    public function withReadyAt(?\DateTimeInterface $readyAt): self
    {
        $self = clone $this;
        $self['readyAt'] = $readyAt;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
