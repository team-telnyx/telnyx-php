<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Siprec;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;

/**
 * Updates siprec session identified by siprec_sid.
 *
 * @see Telnyx\Services\Texml\Accounts\Calls\SiprecService::siprecSidJson()
 *
 * @phpstan-type SiprecSiprecSidJsonParamsShape = array{
 *   accountSid: string, callSid: string, status?: null|Status|value-of<Status>
 * }
 */
final class SiprecSiprecSidJsonParams implements BaseModel
{
    /** @use SdkModel<SiprecSiprecSidJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    #[Required]
    public string $callSid;

    /**
     * The new status of the resource. Specifying `stopped` will end the siprec session.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional('Status', enum: Status::class)]
    public ?string $status;

    /**
     * `new SiprecSiprecSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SiprecSiprecSidJsonParams::with(accountSid: ..., callSid: ...)
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
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        string $accountSid,
        string $callSid,
        Status|string|null $status = null
    ): self {
        $self = new self;

        $self['accountSid'] = $accountSid;
        $self['callSid'] = $callSid;

        null !== $status && $self['status'] = $status;

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

    /**
     * The new status of the resource. Specifying `stopped` will end the siprec session.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
