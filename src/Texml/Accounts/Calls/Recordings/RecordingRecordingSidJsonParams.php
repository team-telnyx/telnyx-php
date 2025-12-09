<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Recordings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams\Status;

/**
 * Updates recording resource for particular call.
 *
 * @see Telnyx\Services\Texml\Accounts\Calls\RecordingsService::recordingSidJson()
 *
 * @phpstan-type RecordingRecordingSidJsonParamsShape = array{
 *   accountSid: string, callSid: string, status?: Status|value-of<Status>
 * }
 */
final class RecordingRecordingSidJsonParams implements BaseModel
{
    /** @use SdkModel<RecordingRecordingSidJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    #[Required]
    public string $callSid;

    /** @var value-of<Status>|null $status */
    #[Optional('Status', enum: Status::class)]
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
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
