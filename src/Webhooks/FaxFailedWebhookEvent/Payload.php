<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxFailedWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\FaxFailedWebhookEvent\Payload\Direction;
use Telnyx\Webhooks\FaxFailedWebhookEvent\Payload\FailureReason;
use Telnyx\Webhooks\FaxFailedWebhookEvent\Payload\Status;

/**
 * @phpstan-type PayloadShape = array{
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   direction?: value-of<Direction>|null,
 *   failure_reason?: value-of<FailureReason>|null,
 *   fax_id?: string|null,
 *   from?: string|null,
 *   media_name?: string|null,
 *   original_media_url?: string|null,
 *   status?: value-of<Status>|null,
 *   to?: string|null,
 *   user_id?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * State received from a command.
     */
    #[Optional]
    public ?string $client_state;

    /**
     * The ID of the connection used to send the fax.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * The direction of the fax.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    /**
     * Cause of the sending failure.
     *
     * @var value-of<FailureReason>|null $failure_reason
     */
    #[Optional(enum: FailureReason::class)]
    public ?string $failure_reason;

    /**
     * Identifies the fax.
     */
    #[Optional]
    public ?string $fax_id;

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    #[Optional]
    public ?string $from;

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    #[Optional]
    public ?string $media_name;

    /**
     * The original URL to the PDF used for the fax's media. If media_name was supplied, this is omitted.
     */
    #[Optional]
    public ?string $original_media_url;

    /**
     * The status of the fax.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    #[Optional]
    public ?string $to;

    /**
     * Identifier of the user to whom the fax belongs.
     */
    #[Optional]
    public ?string $user_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Direction|value-of<Direction> $direction
     * @param FailureReason|value-of<FailureReason> $failure_reason
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $client_state = null,
        ?string $connection_id = null,
        Direction|string|null $direction = null,
        FailureReason|string|null $failure_reason = null,
        ?string $fax_id = null,
        ?string $from = null,
        ?string $media_name = null,
        ?string $original_media_url = null,
        Status|string|null $status = null,
        ?string $to = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $direction && $obj['direction'] = $direction;
        null !== $failure_reason && $obj['failure_reason'] = $failure_reason;
        null !== $fax_id && $obj['fax_id'] = $fax_id;
        null !== $from && $obj['from'] = $from;
        null !== $media_name && $obj['media_name'] = $media_name;
        null !== $original_media_url && $obj['original_media_url'] = $original_media_url;
        null !== $status && $obj['status'] = $status;
        null !== $to && $obj['to'] = $to;
        null !== $user_id && $obj['user_id'] = $user_id;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * The ID of the connection used to send the fax.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * The direction of the fax.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
    }

    /**
     * Cause of the sending failure.
     *
     * @param FailureReason|value-of<FailureReason> $failureReason
     */
    public function withFailureReason(FailureReason|string $failureReason): self
    {
        $obj = clone $this;
        $obj['failure_reason'] = $failureReason;

        return $obj;
    }

    /**
     * Identifies the fax.
     */
    public function withFaxID(string $faxID): self
    {
        $obj = clone $this;
        $obj['fax_id'] = $faxID;

        return $obj;
    }

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj['media_name'] = $mediaName;

        return $obj;
    }

    /**
     * The original URL to the PDF used for the fax's media. If media_name was supplied, this is omitted.
     */
    public function withOriginalMediaURL(string $originalMediaURL): self
    {
        $obj = clone $this;
        $obj['original_media_url'] = $originalMediaURL;

        return $obj;
    }

    /**
     * The status of the fax.
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
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * Identifier of the user to whom the fax belongs.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }
}
