<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonResponse\Status;

/**
 * @phpstan-type CallStreamsJsonResponseShape = array{
 *   accountSid?: string|null,
 *   callSid?: string|null,
 *   dateUpdated?: \DateTimeInterface|null,
 *   name?: string|null,
 *   sid?: string|null,
 *   status?: value-of<Status>|null,
 *   uri?: string|null,
 * }
 */
final class CallStreamsJsonResponse implements BaseModel
{
    /** @use SdkModel<CallStreamsJsonResponseShape> */
    use SdkModel;

    #[Optional('account_sid')]
    public ?string $accountSid;

    #[Optional('call_sid')]
    public ?string $callSid;

    #[Optional('date_updated')]
    public ?\DateTimeInterface $dateUpdated;

    /**
     * The user specified name of Stream.
     */
    #[Optional]
    public ?string $name;

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
        ?string $name = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $accountSid && $obj['accountSid'] = $accountSid;
        null !== $callSid && $obj['callSid'] = $callSid;
        null !== $dateUpdated && $obj['dateUpdated'] = $dateUpdated;
        null !== $name && $obj['name'] = $name;
        null !== $sid && $obj['sid'] = $sid;
        null !== $status && $obj['status'] = $status;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['accountSid'] = $accountSid;

        return $obj;
    }

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['callSid'] = $callSid;

        return $obj;
    }

    public function withDateUpdated(\DateTimeInterface $dateUpdated): self
    {
        $obj = clone $this;
        $obj['dateUpdated'] = $dateUpdated;

        return $obj;
    }

    /**
     * The user specified name of Stream.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Identifier of a resource.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj['sid'] = $sid;

        return $obj;
    }

    /**
     * The status of the streaming.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The relative URI for this streaming resource.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
