<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\Fax\Direction;
use Telnyx\Faxes\Fax\Quality;
use Telnyx\Faxes\Fax\RecordType;
use Telnyx\Faxes\Fax\Status;

/**
 * @phpstan-type fax_alias = array{
 *   id?: string,
 *   clientState?: string,
 *   connectionID?: string,
 *   createdAt?: \DateTimeInterface,
 *   direction?: value-of<Direction>,
 *   from?: string,
 *   fromDisplayName?: string,
 *   mediaName?: string,
 *   mediaURL?: string,
 *   previewURL?: string,
 *   quality?: value-of<Quality>,
 *   recordType?: value-of<RecordType>,
 *   status?: value-of<Status>,
 *   storeMedia?: bool,
 *   storedMediaURL?: string,
 *   to?: string,
 *   updatedAt?: \DateTimeInterface,
 *   webhookFailoverURL?: string,
 *   webhookURL?: string,
 * }
 */
final class Fax implements BaseModel
{
    /** @use SdkModel<fax_alias> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

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
     * ISO 8601 timestamp when resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

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
    #[Api('from_display_name', optional: true)]
    public ?string $fromDisplayName;

    /**
     * The media_name used for the fax's media. Must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. media_name and media_url/contents can't be submitted together.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    /**
     * The URL (or list of URLs) to the PDF used for the fax's media. media_url and media_name/contents can't be submitted together.
     */
    #[Api('media_url', optional: true)]
    public ?string $mediaURL;

    /**
     * If `store_preview` was set to `true`, this is a link to temporary location. Link expires after 10 minutes.
     */
    #[Api('preview_url', optional: true)]
    public ?string $previewURL;

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
     * @var value-of<RecordType>|null $recordType
     */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

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
    #[Api('store_media', optional: true)]
    public ?bool $storeMedia;

    /**
     * If store_media was set to true, this is a link to temporary location. Link expires after 10 minutes.
     */
    #[Api('stored_media_url', optional: true)]
    public ?string $storedMediaURL;

    /**
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    #[Api(optional: true)]
    public ?string $to;

    /**
     * ISO 8601 timestamp when resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Optional failover URL that will receive fax webhooks if webhook_url doesn't return a 2XX response.
     */
    #[Api('webhook_failover_url', optional: true)]
    public ?string $webhookFailoverURL;

    /**
     * URL that will receive fax webhooks.
     */
    #[Api('webhook_url', optional: true)]
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $direction && $obj['direction'] = $direction;
        null !== $from && $obj->from = $from;
        null !== $fromDisplayName && $obj->fromDisplayName = $fromDisplayName;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $mediaURL && $obj->mediaURL = $mediaURL;
        null !== $previewURL && $obj->previewURL = $previewURL;
        null !== $quality && $obj['quality'] = $quality;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $status && $obj['status'] = $status;
        null !== $storeMedia && $obj->storeMedia = $storeMedia;
        null !== $storedMediaURL && $obj->storedMediaURL = $storedMediaURL;
        null !== $to && $obj->to = $to;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

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
     * ISO 8601 timestamp when resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
        $obj->fromDisplayName = $fromDisplayName;

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
     * The URL (or list of URLs) to the PDF used for the fax's media. media_url and media_name/contents can't be submitted together.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->mediaURL = $mediaURL;

        return $obj;
    }

    /**
     * If `store_preview` was set to `true`, this is a link to temporary location. Link expires after 10 minutes.
     */
    public function withPreviewURL(string $previewURL): self
    {
        $obj = clone $this;
        $obj->previewURL = $previewURL;

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
        $obj['recordType'] = $recordType;

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
        $obj->storeMedia = $storeMedia;

        return $obj;
    }

    /**
     * If store_media was set to true, this is a link to temporary location. Link expires after 10 minutes.
     */
    public function withStoredMediaURL(string $storedMediaURL): self
    {
        $obj = clone $this;
        $obj->storedMediaURL = $storedMediaURL;

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
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Optional failover URL that will receive fax webhooks if webhook_url doesn't return a 2XX response.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhookFailoverURL = $webhookFailoverURL;

        return $obj;
    }

    /**
     * URL that will receive fax webhooks.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
