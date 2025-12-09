<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse\Status;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse\Track;

/**
 * @phpstan-type CallSiprecJsonResponseShape = array{
 *   accountSid?: string|null,
 *   callSid?: string|null,
 *   dateCreated?: string|null,
 *   dateUpdated?: string|null,
 *   errorCode?: string|null,
 *   sid?: string|null,
 *   startTime?: string|null,
 *   status?: value-of<Status>|null,
 *   track?: value-of<Track>|null,
 *   uri?: string|null,
 * }
 */
final class CallSiprecJsonResponse implements BaseModel
{
    /** @use SdkModel<CallSiprecJsonResponseShape> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Optional('account_sid')]
    public ?string $accountSid;

    /**
     * The id of the call the resource belongs to.
     */
    #[Optional('call_sid')]
    public ?string $callSid;

    /**
     * The date and time the siprec session was created.
     */
    #[Optional('date_created')]
    public ?string $dateCreated;

    /**
     * The date and time the siprec session was last updated.
     */
    #[Optional('date_updated')]
    public ?string $dateUpdated;

    /**
     * The error code of the siprec session.
     */
    #[Optional('error_code')]
    public ?string $errorCode;

    /**
     * The SID of the siprec session.
     */
    #[Optional]
    public ?string $sid;

    /**
     * The date and time the siprec session was started.
     */
    #[Optional('start_time')]
    public ?string $startTime;

    /**
     * The status of the siprec session.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The track used for the siprec session.
     *
     * @var value-of<Track>|null $track
     */
    #[Optional(enum: Track::class)]
    public ?string $track;

    /**
     * The URI of the siprec session.
     */
    #[Optional]
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
     * @param Track|value-of<Track> $track
     */
    public static function with(
        ?string $accountSid = null,
        ?string $callSid = null,
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        ?string $errorCode = null,
        ?string $sid = null,
        ?string $startTime = null,
        Status|string|null $status = null,
        Track|string|null $track = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $accountSid && $obj['accountSid'] = $accountSid;
        null !== $callSid && $obj['callSid'] = $callSid;
        null !== $dateCreated && $obj['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $obj['dateUpdated'] = $dateUpdated;
        null !== $errorCode && $obj['errorCode'] = $errorCode;
        null !== $sid && $obj['sid'] = $sid;
        null !== $startTime && $obj['startTime'] = $startTime;
        null !== $status && $obj['status'] = $status;
        null !== $track && $obj['track'] = $track;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['accountSid'] = $accountSid;

        return $obj;
    }

    /**
     * The id of the call the resource belongs to.
     */
    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['callSid'] = $callSid;

        return $obj;
    }

    /**
     * The date and time the siprec session was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj['dateCreated'] = $dateCreated;

        return $obj;
    }

    /**
     * The date and time the siprec session was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj['dateUpdated'] = $dateUpdated;

        return $obj;
    }

    /**
     * The error code of the siprec session.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj['errorCode'] = $errorCode;

        return $obj;
    }

    /**
     * The SID of the siprec session.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj['sid'] = $sid;

        return $obj;
    }

    /**
     * The date and time the siprec session was started.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj['startTime'] = $startTime;

        return $obj;
    }

    /**
     * The status of the siprec session.
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
     * The track used for the siprec session.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(Track|string $track): self
    {
        $obj = clone $this;
        $obj['track'] = $track;

        return $obj;
    }

    /**
     * The URI of the siprec session.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
