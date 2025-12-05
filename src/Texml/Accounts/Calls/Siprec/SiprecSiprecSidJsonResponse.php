<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Siprec;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse\Status;

/**
 * @phpstan-type SiprecSiprecSidJsonResponseShape = array{
 *   account_sid?: string|null,
 *   call_sid?: string|null,
 *   date_updated?: string|null,
 *   error_code?: string|null,
 *   sid?: string|null,
 *   status?: value-of<Status>|null,
 *   uri?: string|null,
 * }
 */
final class SiprecSiprecSidJsonResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SiprecSiprecSidJsonResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The id of the account the resource belongs to.
     */
    #[Api(optional: true)]
    public ?string $account_sid;

    /**
     * The id of the call the resource belongs to.
     */
    #[Api(optional: true)]
    public ?string $call_sid;

    /**
     * The date and time the siprec session was last updated.
     */
    #[Api(optional: true)]
    public ?string $date_updated;

    /**
     * The error code of the siprec session.
     */
    #[Api(optional: true)]
    public ?string $error_code;

    /**
     * The SID of the siprec session.
     */
    #[Api(optional: true)]
    public ?string $sid;

    /**
     * The status of the siprec session.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

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
     */
    public static function with(
        ?string $account_sid = null,
        ?string $call_sid = null,
        ?string $date_updated = null,
        ?string $error_code = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $account_sid && $obj['account_sid'] = $account_sid;
        null !== $call_sid && $obj['call_sid'] = $call_sid;
        null !== $date_updated && $obj['date_updated'] = $date_updated;
        null !== $error_code && $obj['error_code'] = $error_code;
        null !== $sid && $obj['sid'] = $sid;
        null !== $status && $obj['status'] = $status;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    /**
     * The id of the call the resource belongs to.
     */
    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['call_sid'] = $callSid;

        return $obj;
    }

    /**
     * The date and time the siprec session was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj['date_updated'] = $dateUpdated;

        return $obj;
    }

    /**
     * The error code of the siprec session.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj['error_code'] = $errorCode;

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
     * The URI of the siprec session.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
