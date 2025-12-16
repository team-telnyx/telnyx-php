<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxSendingStartedWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\FaxSendingStartedWebhookEvent\Payload\Direction;
use Telnyx\Webhooks\FaxSendingStartedWebhookEvent\Payload\Status;

/**
 * @phpstan-type PayloadShape = array{
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   direction?: null|Direction|value-of<Direction>,
 *   faxID?: string|null,
 *   from?: string|null,
 *   mediaName?: string|null,
 *   originalMediaURL?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   to?: string|null,
 *   userID?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * The ID of the connection used to send the fax.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * The direction of the fax.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    /**
     * Identifies the fax.
     */
    #[Optional('fax_id')]
    public ?string $faxID;

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    #[Optional]
    public ?string $from;

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * The original URL to the PDF used for the fax's media. If media_name was supplied, this is omitted.
     */
    #[Optional('original_media_url')]
    public ?string $originalMediaURL;

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
    #[Optional('user_id')]
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
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $direction && $self['direction'] = $direction;
        null !== $faxID && $self['faxID'] = $faxID;
        null !== $from && $self['from'] = $from;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $originalMediaURL && $self['originalMediaURL'] = $originalMediaURL;
        null !== $status && $self['status'] = $status;
        null !== $to && $self['to'] = $to;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * The ID of the connection used to send the fax.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * The direction of the fax.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * Identifies the fax.
     */
    public function withFaxID(string $faxID): self
    {
        $self = clone $this;
        $self['faxID'] = $faxID;

        return $self;
    }

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * The original URL to the PDF used for the fax's media. If media_name was supplied, this is omitted.
     */
    public function withOriginalMediaURL(string $originalMediaURL): self
    {
        $self = clone $this;
        $self['originalMediaURL'] = $originalMediaURL;

        return $self;
    }

    /**
     * The status of the fax.
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
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Identifier of the user to whom the fax belongs.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
