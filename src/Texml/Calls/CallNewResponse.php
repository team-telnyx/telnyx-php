<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Calls\CallNewResponse\Status;

/**
 * @phpstan-type CallNewResponseShape = array{
 *   callSid: string, from: string, status: Status|value-of<Status>, to: string
 * }
 */
final class CallNewResponse implements BaseModel
{
    /** @use SdkModel<CallNewResponseShape> */
    use SdkModel;

    /**
     * The call control ID of the created call.
     */
    #[Required('call_sid')]
    public string $callSid;

    /**
     * The caller address.
     */
    #[Required]
    public string $from;

    /**
     * The initial status of the outbound call.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The called address.
     */
    #[Required]
    public string $to;

    /**
     * `new CallNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallNewResponse::with(callSid: ..., from: ..., status: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallNewResponse)
     *   ->withCallSid(...)
     *   ->withFrom(...)
     *   ->withStatus(...)
     *   ->withTo(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $callSid,
        string $from,
        Status|string $status,
        string $to
    ): self {
        $self = new self;

        $self['callSid'] = $callSid;
        $self['from'] = $from;
        $self['status'] = $status;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The call control ID of the created call.
     */
    public function withCallSid(string $callSid): self
    {
        $self = clone $this;
        $self['callSid'] = $callSid;

        return $self;
    }

    /**
     * The caller address.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The initial status of the outbound call.
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
     * The called address.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
