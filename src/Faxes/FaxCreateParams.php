<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\FaxCreateParams\PreviewFormat;
use Telnyx\Faxes\FaxCreateParams\Quality;

/**
 * Send a fax. Files have size limits and page count limit validations. If a file is bigger than 50MB or has more than 350 pages it will fail with `file_size_limit_exceeded` and `page_count_limit_exceeded` respectively.
 *
 * **Expected Webhooks:**
 *
 * - `fax.queued`
 * - `fax.media.processed`
 * - `fax.sending.started`
 * - `fax.delivered`
 * - `fax.failed`
 *
 * @see Telnyx\FaxesService::create()
 *
 * @phpstan-type FaxCreateParamsShape = array{
 *   connection_id: string,
 *   from: string,
 *   to: string,
 *   client_state?: string,
 *   from_display_name?: string,
 *   media_name?: string,
 *   media_url?: string,
 *   monochrome?: bool,
 *   preview_format?: PreviewFormat|value-of<PreviewFormat>,
 *   quality?: Quality|value-of<Quality>,
 *   store_media?: bool,
 *   store_preview?: bool,
 *   t38_enabled?: bool,
 *   webhook_url?: string,
 * }
 */
final class FaxCreateParams implements BaseModel
{
    /** @use SdkModel<FaxCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The connection ID to send the fax with.
     */
    #[Api]
    public string $connection_id;

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    #[Api]
    public string $from;

    /**
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    #[Api]
    public string $to;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
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
     * The flag to enable monochrome, true black and white fax results.
     */
    #[Api(optional: true)]
    public ?bool $monochrome;

    /**
     * The format for the preview file in case the `store_preview` is `true`.
     *
     * @var value-of<PreviewFormat>|null $preview_format
     */
    #[Api(enum: PreviewFormat::class, optional: true)]
    public ?string $preview_format;

    /**
     * The quality of the fax. The `ultra` settings provides the highest quality available, but also present longer fax processing times. `ultra_light` is best suited for images, wihle `ultra_dark` is best suited for text.
     *
     * @var value-of<Quality>|null $quality
     */
    #[Api(enum: Quality::class, optional: true)]
    public ?string $quality;

    /**
     * Should fax media be stored on temporary URL. It does not support media_name, they can't be submitted together.
     */
    #[Api(optional: true)]
    public ?bool $store_media;

    /**
     * Should fax preview be stored on temporary URL.
     */
    #[Api(optional: true)]
    public ?bool $store_preview;

    /**
     * The flag to disable the T.38 protocol.
     */
    #[Api(optional: true)]
    public ?bool $t38_enabled;

    /**
     * Use this field to override the URL to which Telnyx will send subsequent webhooks for this fax.
     */
    #[Api(optional: true)]
    public ?string $webhook_url;

    /**
     * `new FaxCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FaxCreateParams::with(connection_id: ..., from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FaxCreateParams)->withConnectionID(...)->withFrom(...)->withTo(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PreviewFormat|value-of<PreviewFormat> $preview_format
     * @param Quality|value-of<Quality> $quality
     */
    public static function with(
        string $connection_id,
        string $from,
        string $to,
        ?string $client_state = null,
        ?string $from_display_name = null,
        ?string $media_name = null,
        ?string $media_url = null,
        ?bool $monochrome = null,
        PreviewFormat|string|null $preview_format = null,
        Quality|string|null $quality = null,
        ?bool $store_media = null,
        ?bool $store_preview = null,
        ?bool $t38_enabled = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        $obj->connection_id = $connection_id;
        $obj->from = $from;
        $obj->to = $to;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $from_display_name && $obj->from_display_name = $from_display_name;
        null !== $media_name && $obj->media_name = $media_name;
        null !== $media_url && $obj->media_url = $media_url;
        null !== $monochrome && $obj->monochrome = $monochrome;
        null !== $preview_format && $obj['preview_format'] = $preview_format;
        null !== $quality && $obj['quality'] = $quality;
        null !== $store_media && $obj->store_media = $store_media;
        null !== $store_preview && $obj->store_preview = $store_preview;
        null !== $t38_enabled && $obj->t38_enabled = $t38_enabled;
        null !== $webhook_url && $obj->webhook_url = $webhook_url;

        return $obj;
    }

    /**
     * The connection ID to send the fax with.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

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
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
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
     * The flag to enable monochrome, true black and white fax results.
     */
    public function withMonochrome(bool $monochrome): self
    {
        $obj = clone $this;
        $obj->monochrome = $monochrome;

        return $obj;
    }

    /**
     * The format for the preview file in case the `store_preview` is `true`.
     *
     * @param PreviewFormat|value-of<PreviewFormat> $previewFormat
     */
    public function withPreviewFormat(PreviewFormat|string $previewFormat): self
    {
        $obj = clone $this;
        $obj['preview_format'] = $previewFormat;

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
     * Should fax media be stored on temporary URL. It does not support media_name, they can't be submitted together.
     */
    public function withStoreMedia(bool $storeMedia): self
    {
        $obj = clone $this;
        $obj->store_media = $storeMedia;

        return $obj;
    }

    /**
     * Should fax preview be stored on temporary URL.
     */
    public function withStorePreview(bool $storePreview): self
    {
        $obj = clone $this;
        $obj->store_preview = $storePreview;

        return $obj;
    }

    /**
     * The flag to disable the T.38 protocol.
     */
    public function withT38Enabled(bool $t38Enabled): self
    {
        $obj = clone $this;
        $obj->t38_enabled = $t38Enabled;

        return $obj;
    }

    /**
     * Use this field to override the URL to which Telnyx will send subsequent webhooks for this fax.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhook_url = $webhookURL;

        return $obj;
    }
}
