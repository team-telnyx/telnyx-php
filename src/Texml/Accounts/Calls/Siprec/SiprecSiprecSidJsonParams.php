<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Siprec;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;

/**
 * Updates siprec session identified by siprec_sid.
 *
 * @see Telnyx\Texml\Accounts\Calls\Siprec->siprecSidJson
 *
 * @phpstan-type SiprecSiprecSidJsonParamsShape = array{
 *   account_sid: string,
 *   call_sid: string,
 *   Status?: \Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status|value-of<\Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status>,
 * }
 */
final class SiprecSiprecSidJsonParams implements BaseModel
{
    /** @use SdkModel<SiprecSiprecSidJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $account_sid;

    #[Api]
    public string $call_sid;

    /**
     * The new status of the resource. Specifying `stopped` will end the siprec session.
     *
     * @var value-of<Status>|null $Status
     */
    #[Api(
        enum: Status::class,
        optional: true,
    )]
    public ?string $Status;

    /**
     * `new SiprecSiprecSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SiprecSiprecSidJsonParams::with(account_sid: ..., call_sid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SiprecSiprecSidJsonParams)->withAccountSid(...)->withCallSid(...)
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
     * The new status of the resource. Specifying `stopped` will end the siprec session.
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
