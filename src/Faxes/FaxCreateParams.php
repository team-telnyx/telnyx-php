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
 * @see Telnyx\Faxes->create
 *
 * @phpstan-type fax_create_params = array{
 *   connectionID: string,
 *   from: string,
 *   to: string,
 *   clientState?: string,
 *   fromDisplayName?: string,
 *   mediaName?: string,
 *   mediaURL?: string,
 *   monochrome?: bool,
 *   previewFormat?: PreviewFormat|value-of<PreviewFormat>,
 *   quality?: Quality|value-of<Quality>,
 *   storeMedia?: bool,
 *   storePreview?: bool,
 *   t38Enabled?: bool,
 *   webhookURL?: string,
 * }
 */
final class FaxCreateParams implements BaseModel
{
    /** @use SdkModel<fax_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The connection ID to send the fax with.
     */
    #[Api('connection_id')]
    public string $connectionID;

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
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
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
     * The flag to enable monochrome, true black and white fax results.
     */
    #[Api(optional: true)]
    public ?bool $monochrome;

    /**
     * The format for the preview file in case the `store_preview` is `true`.
     *
     * @var value-of<PreviewFormat>|null $previewFormat
     */
    #[Api('preview_format', enum: PreviewFormat::class, optional: true)]
    public ?string $previewFormat;

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
    #[Api('store_media', optional: true)]
    public ?bool $storeMedia;

    /**
     * Should fax preview be stored on temporary URL.
     */
    #[Api('store_preview', optional: true)]
    public ?bool $storePreview;

    /**
     * The flag to disable the T.38 protocol.
     */
    #[Api('t38_enabled', optional: true)]
    public ?bool $t38Enabled;

    /**
     * Use this field to override the URL to which Telnyx will send subsequent webhooks for this fax.
     */
    #[Api('webhook_url', optional: true)]
    public ?string $webhookURL;

    /**
     * `new FaxCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FaxCreateParams::with(connectionID: ..., from: ..., to: ...)
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
     * @param PreviewFormat|value-of<PreviewFormat> $previewFormat
     * @param Quality|value-of<Quality> $quality
     */
    public static function with(
        string $connectionID,
        string $from,
        string $to,
        ?string $clientState = null,
        ?string $fromDisplayName = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?bool $monochrome = null,
        PreviewFormat|string|null $previewFormat = null,
        Quality|string|null $quality = null,
        ?bool $storeMedia = null,
        ?bool $storePreview = null,
        ?bool $t38Enabled = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        $obj->connectionID = $connectionID;
        $obj->from = $from;
        $obj->to = $to;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $fromDisplayName && $obj->fromDisplayName = $fromDisplayName;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $mediaURL && $obj->mediaURL = $mediaURL;
        null !== $monochrome && $obj->monochrome = $monochrome;
        null !== $previewFormat && $obj['previewFormat'] = $previewFormat;
        null !== $quality && $obj['quality'] = $quality;
        null !== $storeMedia && $obj->storeMedia = $storeMedia;
        null !== $storePreview && $obj->storePreview = $storePreview;
        null !== $t38Enabled && $obj->t38Enabled = $t38Enabled;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * The connection ID to send the fax with.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

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
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
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
        $obj['previewFormat'] = $previewFormat;

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
        $obj->storeMedia = $storeMedia;

        return $obj;
    }

    /**
     * Should fax preview be stored on temporary URL.
     */
    public function withStorePreview(bool $storePreview): self
    {
        $obj = clone $this;
        $obj->storePreview = $storePreview;

        return $obj;
    }

    /**
     * The flag to disable the T.38 protocol.
     */
    public function withT38Enabled(bool $t38Enabled): self
    {
        $obj = clone $this;
        $obj->t38Enabled = $t38Enabled;

        return $obj;
    }

    /**
     * Use this field to override the URL to which Telnyx will send subsequent webhooks for this fax.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
