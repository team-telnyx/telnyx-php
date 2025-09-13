<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxQueuedWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\FaxQueuedWebhookEvent\Payload\Direction;
use Telnyx\Webhooks\FaxQueuedWebhookEvent\Payload\Status;

/**
 * @phpstan-type payload_alias = array{
 *   clientState?: string,
 *   connectionID?: string,
 *   direction?: value-of<Direction>,
 *   faxID?: string,
 *   from?: string,
 *   mediaName?: string,
 *   originalMediaURL?: string,
 *   status?: value-of<Status>,
 *   to?: string,
 *   userID?: string,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<payload_alias> */
    use SdkModel;

    /**
     * State received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * The ID of the connection used to send the fax.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * The direction of the fax.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Api(enum: Direction::class, optional: true)]
    public ?string $direction;

    /**
     * Identifies the fax.
     */
    #[Api('fax_id', optional: true)]
    public ?string $faxID;

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    /**
     * The original URL to the PDF used for the fax's media. If media_name was supplied, this is omitted.
     */
    #[Api('original_media_url', optional: true)]
    public ?string $originalMediaURL;

    /**
     * The status of the fax.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    #[Api(optional: true)]
    public ?string $to;

    /**
     * Identifier of the user to whom the fax belongs.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $clientState = null,
        ?string $connectionID = null,
        Direction|string|null $direction = null,
        ?string $faxID = null,
        ?string $from = null,
        ?string $mediaName = null,
        ?string $originalMediaURL = null,
        Status|string|null $status = null,
        ?string $to = null,
        ?string $userID = null,
    ): self {
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $direction && $obj->direction = $direction instanceof Direction ? $direction->value : $direction;
        null !== $faxID && $obj->faxID = $faxID;
        null !== $from && $obj->from = $from;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $originalMediaURL && $obj->originalMediaURL = $originalMediaURL;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $to && $obj->to = $to;
        null !== $userID && $obj->userID = $userID;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * The ID of the connection used to send the fax.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

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
        $obj->direction = $direction instanceof Direction ? $direction->value : $direction;

        return $obj;
    }

    /**
     * Identifies the fax.
     */
    public function withFaxID(string $faxID): self
    {
        $obj = clone $this;
        $obj->faxID = $faxID;

        return $obj;
    }

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }

    /**
     * The original URL to the PDF used for the fax's media. If media_name was supplied, this is omitted.
     */
    public function withOriginalMediaURL(string $originalMediaURL): self
    {
        $obj = clone $this;
        $obj->originalMediaURL = $originalMediaURL;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Identifier of the user to whom the fax belongs.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
