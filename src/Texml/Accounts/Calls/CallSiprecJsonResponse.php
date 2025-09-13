<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse\Status;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse\Track;

/**
 * @phpstan-type call_siprec_json_response = array{
 *   accountSid?: string,
 *   callSid?: string,
 *   dateCreated?: string,
 *   dateUpdated?: string,
 *   errorCode?: string,
 *   sid?: string,
 *   startTime?: string,
 *   status?: value-of<Status>,
 *   track?: value-of<Track>,
 *   uri?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CallSiprecJsonResponse implements BaseModel
{
    /** @use SdkModel<call_siprec_json_response> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Api('account_sid', optional: true)]
    public ?string $accountSid;

    /**
     * The id of the call the resource belongs to.
     */
    #[Api('call_sid', optional: true)]
    public ?string $callSid;

    /**
     * The date and time the siprec session was created.
     */
    #[Api('date_created', optional: true)]
    public ?string $dateCreated;

    /**
     * The date and time the siprec session was last updated.
     */
    #[Api('date_updated', optional: true)]
    public ?string $dateUpdated;

    /**
     * The error code of the siprec session.
     */
    #[Api('error_code', optional: true)]
    public ?string $errorCode;

    /**
     * The SID of the siprec session.
     */
    #[Api(optional: true)]
    public ?string $sid;

    /**
     * The date and time the siprec session was started.
     */
    #[Api('start_time', optional: true)]
    public ?string $startTime;

    /**
     * The status of the siprec session.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The track used for the siprec session.
     *
     * @var value-of<Track>|null $track
     */
    #[Api(enum: Track::class, optional: true)]
    public ?string $track;

    /**
     * The URI of the siprec session.
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

        null !== $accountSid && $obj->accountSid = $accountSid;
        null !== $callSid && $obj->callSid = $callSid;
        null !== $dateCreated && $obj->dateCreated = $dateCreated;
        null !== $dateUpdated && $obj->dateUpdated = $dateUpdated;
        null !== $errorCode && $obj->errorCode = $errorCode;
        null !== $sid && $obj->sid = $sid;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $track && $obj->track = $track instanceof Track ? $track->value : $track;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }

    /**
     * The id of the call the resource belongs to.
     */
    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj->callSid = $callSid;

        return $obj;
    }

    /**
     * The date and time the siprec session was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj->dateCreated = $dateCreated;

        return $obj;
    }

    /**
     * The date and time the siprec session was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj->dateUpdated = $dateUpdated;

        return $obj;
    }

    /**
     * The error code of the siprec session.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj->errorCode = $errorCode;

        return $obj;
    }

    /**
     * The SID of the siprec session.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj->sid = $sid;

        return $obj;
    }

    /**
     * The date and time the siprec session was started.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

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
        $obj->track = $track instanceof Track ? $track->value : $track;

        return $obj;
    }

    /**
     * The URI of the siprec session.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
