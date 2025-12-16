<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Siprec;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse\Status;

/**
 * @phpstan-type SiprecSiprecSidJsonResponseShape = array{
 *   accountSid?: string|null,
 *   callSid?: string|null,
 *   dateUpdated?: string|null,
 *   errorCode?: string|null,
 *   sid?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   uri?: string|null,
 * }
 */
final class SiprecSiprecSidJsonResponse implements BaseModel
{
    /** @use SdkModel<SiprecSiprecSidJsonResponseShape> */
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
     * The status of the siprec session.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

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
     */
    public static function with(
        ?string $accountSid = null,
        ?string $callSid = null,
        ?string $dateUpdated = null,
        ?string $errorCode = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $accountSid && $self['accountSid'] = $accountSid;
        null !== $callSid && $self['callSid'] = $callSid;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
        null !== $errorCode && $self['errorCode'] = $errorCode;
        null !== $sid && $self['sid'] = $sid;
        null !== $status && $self['status'] = $status;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    /**
     * The id of the call the resource belongs to.
     */
    public function withCallSid(string $callSid): self
    {
        $self = clone $this;
        $self['callSid'] = $callSid;

        return $self;
    }

    /**
     * The date and time the siprec session was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $self = clone $this;
        $self['dateUpdated'] = $dateUpdated;

        return $self;
    }

    /**
     * The error code of the siprec session.
     */
    public function withErrorCode(string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    /**
     * The SID of the siprec session.
     */
    public function withSid(string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    /**
     * The status of the siprec session.
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
     * The URI of the siprec session.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
