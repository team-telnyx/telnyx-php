<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 * @see Telnyx\Services\FaxesService::create()
 *
 * @phpstan-type FaxCreateParamsShape = array{
 *   connectionID: string,
 *   from: string,
 *   to: string,
 *   clientState?: string|null,
 *   fromDisplayName?: string|null,
 *   mediaName?: string|null,
 *   mediaURL?: string|null,
 *   monochrome?: bool|null,
 *   previewFormat?: null|PreviewFormat|value-of<PreviewFormat>,
 *   quality?: null|Quality|value-of<Quality>,
 *   storeMedia?: bool|null,
 *   storePreview?: bool|null,
 *   t38Enabled?: bool|null,
 *   webhookURL?: string|null,
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
    #[Required('connection_id')]
    public string $connectionID;

    /**
     * The phone number, in E.164 format, the fax will be sent from.
     */
    #[Required]
    public string $from;

    /**
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    #[Required]
    public string $to;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
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
     * The flag to enable monochrome, true black and white fax results.
     */
    #[Optional]
    public ?bool $monochrome;

    /**
     * The format for the preview file in case the `store_preview` is `true`.
     *
     * @var value-of<PreviewFormat>|null $previewFormat
     */
    #[Optional('preview_format', enum: PreviewFormat::class)]
    public ?string $previewFormat;

    /**
     * The quality of the fax. The `ultra` settings provides the highest quality available, but also present longer fax processing times. `ultra_light` is best suited for images, wihle `ultra_dark` is best suited for text.
     *
     * @var value-of<Quality>|null $quality
     */
    #[Optional(enum: Quality::class)]
    public ?string $quality;

    /**
     * Should fax media be stored on temporary URL. It does not support media_name, they can't be submitted together.
     */
    #[Optional('store_media')]
    public ?bool $storeMedia;

    /**
     * Should fax preview be stored on temporary URL.
     */
    #[Optional('store_preview')]
    public ?bool $storePreview;

    /**
     * The flag to disable the T.38 protocol.
     */
    #[Optional('t38_enabled')]
    public ?bool $t38Enabled;

    /**
     * Use this field to override the URL to which Telnyx will send subsequent webhooks for this fax.
     */
    #[Optional('webhook_url')]
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
     * @param PreviewFormat|value-of<PreviewFormat>|null $previewFormat
     * @param Quality|value-of<Quality>|null $quality
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
        $self = new self;

        $self['connectionID'] = $connectionID;
        $self['from'] = $from;
        $self['to'] = $to;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $fromDisplayName && $self['fromDisplayName'] = $fromDisplayName;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $monochrome && $self['monochrome'] = $monochrome;
        null !== $previewFormat && $self['previewFormat'] = $previewFormat;
        null !== $quality && $self['quality'] = $quality;
        null !== $storeMedia && $self['storeMedia'] = $storeMedia;
        null !== $storePreview && $self['storePreview'] = $storePreview;
        null !== $t38Enabled && $self['t38Enabled'] = $t38Enabled;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * The connection ID to send the fax with.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

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
     * The phone number, in E.164 format, the fax will be sent to or SIP URI.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
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
     * The flag to enable monochrome, true black and white fax results.
     */
    public function withMonochrome(bool $monochrome): self
    {
        $self = clone $this;
        $self['monochrome'] = $monochrome;

        return $self;
    }

    /**
     * The format for the preview file in case the `store_preview` is `true`.
     *
     * @param PreviewFormat|value-of<PreviewFormat> $previewFormat
     */
    public function withPreviewFormat(PreviewFormat|string $previewFormat): self
    {
        $self = clone $this;
        $self['previewFormat'] = $previewFormat;

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
     * Should fax media be stored on temporary URL. It does not support media_name, they can't be submitted together.
     */
    public function withStoreMedia(bool $storeMedia): self
    {
        $self = clone $this;
        $self['storeMedia'] = $storeMedia;

        return $self;
    }

    /**
     * Should fax preview be stored on temporary URL.
     */
    public function withStorePreview(bool $storePreview): self
    {
        $self = clone $this;
        $self['storePreview'] = $storePreview;

        return $self;
    }

    /**
     * The flag to disable the T.38 protocol.
     */
    public function withT38Enabled(bool $t38Enabled): self
    {
        $self = clone $this;
        $self['t38Enabled'] = $t38Enabled;

        return $self;
    }

    /**
     * Use this field to override the URL to which Telnyx will send subsequent webhooks for this fax.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
