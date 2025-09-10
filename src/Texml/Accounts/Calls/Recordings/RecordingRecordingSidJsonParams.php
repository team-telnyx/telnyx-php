<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Recordings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams\Status;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RecordingRecordingSidJsonParams); // set properties as needed
 * $client->texml.accounts.calls.recordings->recordingSidJson(...$params->toArray());
 * ```
 * Updates recording resource for particular call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.calls.recordings->recordingSidJson(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Calls\Recordings->recordingSidJson
 *
 * @phpstan-type recording_recording_sid_json_params = array{
 *   accountSid: string, callSid: string, status?: Status|value-of<Status>
 * }
 */
final class RecordingRecordingSidJsonParams implements BaseModel
{
    /** @use SdkModel<recording_recording_sid_json_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    #[Api]
    public string $callSid;

    /** @var value-of<Status>|null $status */
    #[Api('Status', enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * `new RecordingRecordingSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingRecordingSidJsonParams::with(accountSid: ..., callSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordingRecordingSidJsonParams)->withAccountSid(...)->withCallSid(...)
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
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }
}
