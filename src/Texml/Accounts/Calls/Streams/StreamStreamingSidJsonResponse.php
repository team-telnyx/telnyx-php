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
 * @phpstan-type stream_streaming_sid_json_response = array{
 *   accountSid?: string,
 *   callSid?: string,
 *   dateUpdated?: \DateTimeInterface,
 *   sid?: string,
 *   status?: value-of<Status>,
 *   uri?: string,
 * }
 */
final class StreamStreamingSidJsonResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<stream_streaming_sid_json_response> */
    use SdkModel;

    use SdkResponse;

    #[Api('account_sid', optional: true)]
    public ?string $accountSid;

    #[Api('call_sid', optional: true)]
    public ?string $callSid;

    #[Api('date_updated', optional: true)]
    public ?\DateTimeInterface $dateUpdated;

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
        ?string $accountSid = null,
        ?string $callSid = null,
        ?\DateTimeInterface $dateUpdated = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $accountSid && $obj->accountSid = $accountSid;
        null !== $callSid && $obj->callSid = $callSid;
        null !== $dateUpdated && $obj->dateUpdated = $dateUpdated;
        null !== $sid && $obj->sid = $sid;
        null !== $status && $obj['status'] = $status;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj->callSid = $callSid;

        return $obj;
    }

    public function withDateUpdated(\DateTimeInterface $dateUpdated): self
    {
        $obj = clone $this;
        $obj->dateUpdated = $dateUpdated;

        return $obj;
    }

    /**
     * Identifier of a resource.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj->sid = $sid;

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
        $obj->uri = $uri;

        return $obj;
    }
}
