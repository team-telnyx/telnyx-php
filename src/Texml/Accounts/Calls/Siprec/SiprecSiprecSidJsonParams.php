<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Siprec;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SiprecSiprecSidJsonParams); // set properties as needed
 * $client->texml.accounts.calls.siprec->siprecSidJson(...$params->toArray());
 * ```
 * Updates siprec session identified by siprec_sid.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.calls.siprec->siprecSidJson(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Calls\Siprec->siprecSidJson
 *
 * @phpstan-type siprec_siprec_sid_json_params = array{
 *   accountSid: string, callSid: string, status?: Status|value-of<Status>
 * }
 */
final class SiprecSiprecSidJsonParams implements BaseModel
{
    /** @use SdkModel<siprec_siprec_sid_json_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    #[Api]
    public string $callSid;

    /**
     * The new status of the resource. Specifying `stopped` will end the siprec session.
     *
     * @var value-of<Status>|null $status
     */
    #[Api('Status', enum: Status::class, optional: true)]
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $accountSid,
        string $callSid,
        Status|string|null $status = null
    ): self {
        $obj = new self;

        $obj->accountSid = $accountSid;
        $obj->callSid = $callSid;

        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;

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

    /**
     * The new status of the resource. Specifying `stopped` will end the siprec session.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }
}
