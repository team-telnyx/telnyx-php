<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxDeliveredWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\FaxDeliveredWebhookEvent\Payload1\Direction;
use Telnyx\Webhooks\FaxDeliveredWebhookEvent\Payload1\Status;

/**
 * @phpstan-type Payload1Shape = array{
 *   call_duration_secs?: int|null,
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   direction?: value-of<Direction>|null,
 *   fax_id?: string|null,
 *   from?: string|null,
 *   media_name?: string|null,
 *   original_media_url?: string|null,
 *   page_count?: int|null,
 *   status?: value-of<Status>|null,
 *   to?: string|null,
 *   user_id?: string|null,
 * }
 */
final class Payload1 implements BaseModel
{
    /** @use SdkModel<Payload1Shape> */
    use SdkModel;

    /**
     * The duration of the call in seconds.
     */
    #[Api(optional: true)]
    public ?int $call_duration_secs;

    /**
     * State received from a command.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * The ID of the connection used to send the fax.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

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
    #[Api(optional: true)]
    public ?string $fax_id;

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    #[Api(optional: true)]
    public ?string $media_name;

    /**
     * The original URL to the PDF used for the fax's media. If media_name was supplied, this is omitted.
     */
    #[Api(optional: true)]
    public ?string $original_media_url;

    /**
     * Number of transferred pages.
     */
    #[Api(optional: true)]
    public ?int $page_count;

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
    #[Api(optional: true)]
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?int $call_duration_secs = null,
        ?string $client_state = null,
        ?string $connection_id = null,
        Direction|string|null $direction = null,
        ?string $fax_id = null,
        ?string $from = null,
        ?string $media_name = null,
        ?string $original_media_url = null,
        ?int $page_count = null,
        Status|string|null $status = null,
        ?string $to = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $call_duration_secs && $obj['call_duration_secs'] = $call_duration_secs;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $direction && $obj['direction'] = $direction;
        null !== $fax_id && $obj['fax_id'] = $fax_id;
        null !== $from && $obj['from'] = $from;
        null !== $media_name && $obj['media_name'] = $media_name;
        null !== $original_media_url && $obj['original_media_url'] = $original_media_url;
        null !== $page_count && $obj['page_count'] = $page_count;
        null !== $status && $obj['status'] = $status;
        null !== $to && $obj['to'] = $to;
        null !== $user_id && $obj['user_id'] = $user_id;

        return $obj;
    }

    /**
     * The duration of the call in seconds.
     */
    public function withCallDurationSecs(int $callDurationSecs): self
    {
        $obj = clone $this;
        $obj['call_duration_secs'] = $callDurationSecs;

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
     * Number of transferred pages.
     */
    public function withPageCount(int $pageCount): self
    {
        $obj = clone $this;
        $obj['page_count'] = $pageCount;

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
