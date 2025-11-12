<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Streams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status;

/**
 * Updates streaming resource for particular call.
 *
 * @see Telnyx\Services\Texml\Accounts\Calls\StreamsService::streamingSidJson()
 *
 * @phpstan-type StreamStreamingSidJsonParamsShape = array{
 *   account_sid: string,
 *   call_sid: string,
 *   Status?: \Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status|value-of<\Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status>,
 * }
 */
final class StreamStreamingSidJsonParams implements BaseModel
{
    /** @use SdkModel<StreamStreamingSidJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $account_sid;

    #[Api]
    public string $call_sid;

    /**
     * The status of the Stream you wish to update.
     *
     * @var value-of<Status>|null $Status
     */
    #[Api(
        enum: Status::class,
        optional: true,
    )]
    public ?string $Status;

    /**
     * `new StreamStreamingSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StreamStreamingSidJsonParams::with(account_sid: ..., call_sid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StreamStreamingSidJsonParams)->withAccountSid(...)->withCallSid(...)
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
     * @param Status|value-of<Status> $Status
     */
    public static function with(
        string $account_sid,
        string $call_sid,
        Status|string|null $Status = null,
    ): self {
        $obj = new self;

        $obj->account_sid = $account_sid;
        $obj->call_sid = $call_sid;

        null !== $Status && $obj['Status'] = $Status;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->account_sid = $accountSid;

        return $obj;
    }

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj->call_sid = $callSid;

        return $obj;
    }

    /**
     * The status of the Stream you wish to update.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(
        Status|string $status,
    ): self {
        $obj = clone $this;
        $obj['Status'] = $status;

        return $obj;
    }
}
