<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Streams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse\Status;

/**
 * @phpstan-type StreamStreamingSidJsonResponseShape = array{
 *   accountSid?: string|null,
 *   callSid?: string|null,
 *   dateUpdated?: \DateTimeInterface|null,
 *   sid?: string|null,
 *   status?: value-of<Status>|null,
 *   uri?: string|null,
 * }
 */
final class StreamStreamingSidJsonResponse implements BaseModel
{
    /** @use SdkModel<StreamStreamingSidJsonResponseShape> */
    use SdkModel;

    #[Optional('account_sid')]
    public ?string $accountSid;

    #[Optional('call_sid')]
    public ?string $callSid;

    #[Optional('date_updated')]
    public ?\DateTimeInterface $dateUpdated;

    /**
     * Identifier of a resource.
     */
    #[Optional]
    public ?string $sid;

    /**
     * The status of the streaming.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The relative URI for this streaming resource.
     */
    #[Optional]
    public ?string $uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $accountSid = null,
        ?string $callSid = null,
        ?\DateTimeInterface $dateUpdated = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $accountSid && $self['accountSid'] = $accountSid;
        null !== $callSid && $self['callSid'] = $callSid;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
        null !== $sid && $self['sid'] = $sid;
        null !== $status && $self['status'] = $status;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    public function withCallSid(string $callSid): self
    {
        $self = clone $this;
        $self['callSid'] = $callSid;

        return $self;
    }

    public function withDateUpdated(\DateTimeInterface $dateUpdated): self
    {
        $self = clone $this;
        $self['dateUpdated'] = $dateUpdated;

        return $self;
    }

    /**
     * Identifier of a resource.
     */
    public function withSid(string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    /**
     * The status of the streaming.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The relative URI for this streaming resource.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
