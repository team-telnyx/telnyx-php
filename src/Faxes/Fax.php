<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\Fax\Direction;
use Telnyx\Faxes\Fax\Quality;
use Telnyx\Faxes\Fax\RecordType;
use Telnyx\Faxes\Fax\Status;

/**
 * @phpstan-type FaxShape = array{
 *   id?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   direction?: null|Direction|value-of<Direction>,
 *   from?: string|null,
 *   fromDisplayName?: string|null,
 *   mediaName?: string|null,
 *   mediaURL?: string|null,
 *   previewURL?: string|null,
 *   quality?: null|Quality|value-of<Quality>,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   status?: null|Status|value-of<Status>,
 *   storeMedia?: bool|null,
 *   storedMediaURL?: string|null,
 *   to?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class Fax implements BaseModel
{
    /** @use SdkModel<FaxShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Optional]
    public ?string $id;

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
     * ISO 8601 timestamp when resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The direction of the fax.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    #[Optional]
    public ?string $from;

    /**
     * The string used as the caller id name (SIP From Display Name) presented to the destination (`to` number).
     */
    #[Optional('from_display_name')]
    public ?string $fromDisplayName;

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * The URL (or list of URLs) to the PDF used for the fax's media. media_url and media_name/contents can't be submitted together.
     */
    #[Optional('media_url')]
    public ?string $mediaURL;

    /**
     * If `store_preview` was set to `true`, this is a link to temporary location. Link expires after 10 minutes.
     */
    #[Optional('preview_url')]
    public ?string $previewURL;

    /**
     * The quality of the fax. The `ultra` settings provides the highest quality available, but also present longer fax processing times. `ultra_light` is best suited for images, wihle `ultra_dark` is best suited for text.
     *
     * @var value-of<Quality>|null $quality
     */
    #[Optional(enum: Quality::class)]
    public ?string $quality;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Status of the fax.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Should fax media be stored on temporary URL. It does not support media_name.
     */
    #[Optional('store_media')]
    public ?bool $storeMedia;

    /**
     * If store_media was set to true, this is a link to temporary location. Link expires after 10 minutes.
     */
    #[Optional('stored_media_url')]
    public ?string $storedMediaURL;

    /**
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    #[Optional]
    public ?string $to;

    /**
     * ISO 8601 timestamp when resource was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Optional failover URL that will receive fax webhooks if webhook_url doesn't return a 2XX response.
     */
    #[Optional('webhook_failover_url')]
    public ?string $webhookFailoverURL;

    /**
     * URL that will receive fax webhooks.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

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
     * @param Quality|value-of<Quality> $quality
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?\DateTimeInterface $createdAt = null,
        Direction|string|null $direction = null,
        ?string $from = null,
        ?string $fromDisplayName = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?string $previewURL = null,
        Quality|string|null $quality = null,
        RecordType|string|null $recordType = null,
        Status|string|null $status = null,
        ?bool $storeMedia = null,
        ?string $storedMediaURL = null,
        ?string $to = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $direction && $self['direction'] = $direction;
        null !== $from && $self['from'] = $from;
        null !== $fromDisplayName && $self['fromDisplayName'] = $fromDisplayName;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $previewURL && $self['previewURL'] = $previewURL;
        null !== $quality && $self['quality'] = $quality;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $storeMedia && $self['storeMedia'] = $storeMedia;
        null !== $storedMediaURL && $self['storedMediaURL'] = $storedMediaURL;
        null !== $to && $self['to'] = $to;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * ISO 8601 timestamp when resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * The phone number, in E.164 format, the fax will be sent from.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The string used as the caller id name (SIP From Display Name) presented to the destination (`to` number).
     */
    public function withFromDisplayName(string $fromDisplayName): self
    {
        $self = clone $this;
        $self['fromDisplayName'] = $fromDisplayName;

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
     * The URL (or list of URLs) to the PDF used for the fax's media. media_url and media_name/contents can't be submitted together.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $self = clone $this;
        $self['mediaURL'] = $mediaURL;

        return $self;
    }

    /**
     * If `store_preview` was set to `true`, this is a link to temporary location. Link expires after 10 minutes.
     */
    public function withPreviewURL(string $previewURL): self
    {
        $self = clone $this;
        $self['previewURL'] = $previewURL;

        return $self;
    }

    /**
     * The quality of the fax. The `ultra` settings provides the highest quality available, but also present longer fax processing times. `ultra_light` is best suited for images, wihle `ultra_dark` is best suited for text.
     *
     * @param Quality|value-of<Quality> $quality
     */
    public function withQuality(Quality|string $quality): self
    {
        $self = clone $this;
        $self['quality'] = $quality;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Status of the fax.
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
     * Should fax media be stored on temporary URL. It does not support media_name.
     */
    public function withStoreMedia(bool $storeMedia): self
    {
        $self = clone $this;
        $self['storeMedia'] = $storeMedia;

        return $self;
    }

    /**
     * If store_media was set to true, this is a link to temporary location. Link expires after 10 minutes.
     */
    public function withStoredMediaURL(string $storedMediaURL): self
    {
        $self = clone $this;
        $self['storedMediaURL'] = $storedMediaURL;

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
     * ISO 8601 timestamp when resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Optional failover URL that will receive fax webhooks if webhook_url doesn't return a 2XX response.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * URL that will receive fax webhooks.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
