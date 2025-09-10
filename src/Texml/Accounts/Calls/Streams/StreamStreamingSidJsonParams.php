<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Streams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new StreamStreamingSidJsonParams); // set properties as needed
 * $client->texml.accounts.calls.streams->streamingSidJson(...$params->toArray());
 * ```
 * Updates streaming resource for particular call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.calls.streams->streamingSidJson(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Calls\Streams->streamingSidJson
 *
 * @phpstan-type stream_streaming_sid_json_params = array{
 *   accountSid: string, callSid: string, status?: Status|value-of<Status>
 * }
 */
final class StreamStreamingSidJsonParams implements BaseModel
{
    /** @use SdkModel<stream_streaming_sid_json_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    #[Api]
    public string $callSid;

    /**
     * The status of the Stream you wish to update.
     *
     * @var value-of<Status>|null $status
     */
    #[Api('Status', enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * `new StreamStreamingSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StreamStreamingSidJsonParams::with(accountSid: ..., callSid: ...)
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
     * The status of the Stream you wish to update.
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
