<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionCreateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageBase64Source;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageURLSource;

/**
 * Not supported for Google Meet and Teams joins (422 unsupported_capability). Write-only static camera-tile image for this session, not an account or participant profile photo. Supply exactly one JPEG source. When effective, the image is used as the bot's static camera/video output; presentation varies by meeting platform and recording configuration and is not guaranteed in recordings. An attached assistant or avatar takes precedence, so this input is ignored and a URL source is not fetched.
 *
 * @phpstan-import-type MeetingSessionCameraImageBase64SourceShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageBase64Source
 * @phpstan-import-type MeetingSessionCameraImageURLSourceShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageURLSource
 *
 * @phpstan-type CameraImageVariants = MeetingSessionCameraImageBase64Source|MeetingSessionCameraImageURLSource
 * @phpstan-type CameraImageShape = CameraImageVariants|MeetingSessionCameraImageBase64SourceShape|MeetingSessionCameraImageURLSourceShape
 */
final class CameraImage implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            MeetingSessionCameraImageBase64Source::class,
            MeetingSessionCameraImageURLSource::class,
        ];
    }
}
