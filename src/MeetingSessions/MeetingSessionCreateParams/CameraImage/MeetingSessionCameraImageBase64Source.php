<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MeetingSessionCameraImageBase64SourceShape = array{
 *   base64Data: string, format: 'jpeg'
 * }
 */
final class MeetingSessionCameraImageBase64Source implements BaseModel
{
    /** @use SdkModel<MeetingSessionCameraImageBase64SourceShape> */
    use SdkModel;

    /**
     * Only JPEG images are accepted.
     *
     * @var 'jpeg' $format
     */
    #[Required]
    public string $format = 'jpeg';

    /**
     * Canonical plain RFC 4648 Base64 for a valid decoded JPEG. Data URIs, whitespace, and the URL-safe alphabet are rejected. The encoded value is limited to 1,835,008 characters and the decoded JPEG to 1,363,148 bytes. The JPEG is limited to 4,096 pixels per dimension, 4 megapixels, and 128 MB of decoder memory. The image bytes are not persisted, returned, or logged.
     */
    #[Required('base64_data')]
    public string $base64Data;

    /**
     * `new MeetingSessionCameraImageBase64Source()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionCameraImageBase64Source::with(base64Data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionCameraImageBase64Source)->withBase64Data(...)
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
     */
    public static function with(string $base64Data): self
    {
        $self = new self;

        $self['base64Data'] = $base64Data;

        return $self;
    }

    /**
     * Canonical plain RFC 4648 Base64 for a valid decoded JPEG. Data URIs, whitespace, and the URL-safe alphabet are rejected. The encoded value is limited to 1,835,008 characters and the decoded JPEG to 1,363,148 bytes. The JPEG is limited to 4,096 pixels per dimension, 4 megapixels, and 128 MB of decoder memory. The image bytes are not persisted, returned, or logged.
     */
    public function withBase64Data(string $base64Data): self
    {
        $self = clone $this;
        $self['base64Data'] = $base64Data;

        return $self;
    }

    /**
     * Only JPEG images are accepted.
     *
     * @param 'jpeg' $format
     */
    public function withFormat(string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }
}
