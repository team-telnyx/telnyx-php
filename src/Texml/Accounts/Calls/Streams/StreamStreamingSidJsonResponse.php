<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Streams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse\Status;

/**
 * @phpstan-type StreamStreamingSidJsonResponseShape = array{
 *   account_sid?: string|null,
 *   call_sid?: string|null,
 *   date_updated?: \DateTimeInterface|null,
 *   sid?: string|null,
 *   status?: value-of<Status>|null,
 *   uri?: string|null,
 * }
 */
final class StreamStreamingSidJsonResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<StreamStreamingSidJsonResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $account_sid;

    #[Api(optional: true)]
    public ?string $call_sid;

    #[Api(optional: true)]
    public ?\DateTimeInterface $date_updated;

    /**
     * Identifier of a resource.
     */
    #[Api(optional: true)]
    public ?string $sid;

    /**
     * The status of the streaming.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The relative URI for this streaming resource.
     */
    #[Api(optional: true)]
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
        ?string $account_sid = null,
        ?string $call_sid = null,
        ?\DateTimeInterface $date_updated = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $account_sid && $obj['account_sid'] = $account_sid;
        null !== $call_sid && $obj['call_sid'] = $call_sid;
        null !== $date_updated && $obj['date_updated'] = $date_updated;
        null !== $sid && $obj['sid'] = $sid;
        null !== $status && $obj['status'] = $status;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['call_sid'] = $callSid;

        return $obj;
    }

    public function withDateUpdated(\DateTimeInterface $dateUpdated): self
    {
        $obj = clone $this;
        $obj['date_updated'] = $dateUpdated;

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
