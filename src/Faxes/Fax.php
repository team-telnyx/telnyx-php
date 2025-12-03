<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Faxes\Fax\Direction;
use Telnyx\Faxes\Fax\Quality;
use Telnyx\Faxes\Fax\RecordType;
use Telnyx\Faxes\Fax\Status;

/**
 * @phpstan-type FaxShape = array{
 *   id?: string|null,
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   direction?: value-of<Direction>|null,
 *   from?: string|null,
 *   from_display_name?: string|null,
 *   media_name?: string|null,
 *   media_url?: string|null,
 *   preview_url?: string|null,
 *   quality?: value-of<Quality>|null,
 *   record_type?: value-of<RecordType>|null,
 *   status?: value-of<Status>|null,
 *   store_media?: bool|null,
 *   stored_media_url?: string|null,
 *   to?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 *   webhook_failover_url?: string|null,
 *   webhook_url?: string|null,
 * }
 */
final class Fax implements BaseModel, ResponseConverter
{
    /** @use SdkModel<FaxShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

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
     * ISO 8601 timestamp when resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * The direction of the fax.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Api(enum: Direction::class, optional: true)]
    public ?string $direction;

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The string used as the caller id name (SIP From Display Name) presented to the destination (`to` number).
     */
    #[Api(optional: true)]
    public ?string $from_display_name;

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    #[Api(optional: true)]
    public ?string $media_name;

    /**
     * The URL (or list of URLs) to the PDF used for the fax's media. media_url and media_name/contents can't be submitted together.
     */
    #[Api(optional: true)]
    public ?string $media_url;

    /**
     * If `store_preview` was set to `true`, this is a link to temporary location. Link expires after 10 minutes.
     */
    #[Api(optional: true)]
    public ?string $preview_url;

    /**
     * The quality of the fax. The `ultra` settings provides the highest quality available, but also present longer fax processing times. `ultra_light` is best suited for images, wihle `ultra_dark` is best suited for text.
     *
     * @var value-of<Quality>|null $quality
     */
    #[Api(enum: Quality::class, optional: true)]
    public ?string $quality;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /**
     * Status of the fax.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Should fax media be stored on temporary URL. It does not support media_name.
     */
    #[Api(optional: true)]
    public ?bool $store_media;

    /**
     * If store_media was set to true, this is a link to temporary location. Link expires after 10 minutes.
     */
    #[Api(optional: true)]
    public ?string $stored_media_url;

    /**
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    #[Api(optional: true)]
    public ?string $to;

    /**
     * ISO 8601 timestamp when resource was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * Optional failover URL that will receive fax webhooks if webhook_url doesn't return a 2XX response.
     */
    #[Api(optional: true)]
    public ?string $webhook_failover_url;

    /**
     * URL that will receive fax webhooks.
     */
    #[Api(optional: true)]
    public ?string $webhook_url;

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
     * @param RecordType|value-of<RecordType> $record_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $client_state = null,
        ?string $connection_id = null,
        ?\DateTimeInterface $created_at = null,
        Direction|string|null $direction = null,
        ?string $from = null,
        ?string $from_display_name = null,
        ?string $media_name = null,
        ?string $media_url = null,
        ?string $preview_url = null,
        Quality|string|null $quality = null,
        RecordType|string|null $record_type = null,
        Status|string|null $status = null,
        ?bool $store_media = null,
        ?string $stored_media_url = null,
        ?string $to = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $webhook_failover_url = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $client_state && $obj->client_state = $client_state;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $direction && $obj['direction'] = $direction;
        null !== $from && $obj->from = $from;
        null !== $from_display_name && $obj->from_display_name = $from_display_name;
        null !== $media_name && $obj->media_name = $media_name;
        null !== $media_url && $obj->media_url = $media_url;
        null !== $preview_url && $obj->preview_url = $preview_url;
        null !== $quality && $obj['quality'] = $quality;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $status && $obj['status'] = $status;
        null !== $store_media && $obj->store_media = $store_media;
        null !== $stored_media_url && $obj->stored_media_url = $stored_media_url;
        null !== $to && $obj->to = $to;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $webhook_failover_url && $obj->webhook_failover_url = $webhook_failover_url;
        null !== $webhook_url && $obj->webhook_url = $webhook_url;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * The ID of the connection used to send the fax.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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
     * The phone number, in E.164 format, the fax will be sent from.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The string used as the caller id name (SIP From Display Name) presented to the destination (`to` number).
     */
    public function withFromDisplayName(string $fromDisplayName): self
    {
        $obj = clone $this;
        $obj->from_display_name = $fromDisplayName;

        return $obj;
    }

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->media_name = $mediaName;

        return $obj;
    }

    /**
     * The URL (or list of URLs) to the PDF used for the fax's media. media_url and media_name/contents can't be submitted together.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->media_url = $mediaURL;

        return $obj;
    }

    /**
     * If `store_preview` was set to `true`, this is a link to temporary location. Link expires after 10 minutes.
     */
    public function withPreviewURL(string $previewURL): self
    {
        $obj = clone $this;
        $obj->preview_url = $previewURL;

        return $obj;
    }

    /**
     * The quality of the fax. The `ultra` settings provides the highest quality available, but also present longer fax processing times. `ultra_light` is best suited for images, wihle `ultra_dark` is best suited for text.
     *
     * @param Quality|value-of<Quality> $quality
     */
    public function withQuality(Quality|string $quality): self
    {
        $obj = clone $this;
        $obj['quality'] = $quality;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Status of the fax.
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
     * Should fax media be stored on temporary URL. It does not support media_name.
     */
    public function withStoreMedia(bool $storeMedia): self
    {
        $obj = clone $this;
        $obj->store_media = $storeMedia;

        return $obj;
    }

    /**
     * If store_media was set to true, this is a link to temporary location. Link expires after 10 minutes.
     */
    public function withStoredMediaURL(string $storedMediaURL): self
    {
        $obj = clone $this;
        $obj->stored_media_url = $storedMediaURL;

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
     * ISO 8601 timestamp when resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * Optional failover URL that will receive fax webhooks if webhook_url doesn't return a 2XX response.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhook_failover_url = $webhookFailoverURL;

        return $obj;
    }

    /**
     * URL that will receive fax webhooks.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhook_url = $webhookURL;

        return $obj;
    }
}
