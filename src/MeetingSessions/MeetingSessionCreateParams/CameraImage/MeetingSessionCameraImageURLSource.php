<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MeetingSessionCameraImageURLSourceShape = array{
 *   format: 'jpeg', url: string
 * }
 */
final class MeetingSessionCameraImageURLSource implements BaseModel
{
    /** @use SdkModel<MeetingSessionCameraImageURLSourceShape> */
    use SdkModel;

    /**
     * Only JPEG images are accepted.
     *
     * @var 'jpeg' $format
     */
    #[Required]
    public string $format = 'jpeg';

    /**
     * Public HTTPS JPEG URL with at most 2,048 characters and no credentials, fragment, surrounding whitespace, raw control characters, or explicit non-default port. Signed queries are allowed but must be treated as credentials. Fetching is limited to public network destinations, a five-second timeout, no redirects, a 2xx image/jpeg response with identity or no content encoding, and a 1,363,148-byte limit enforced against both declared and streamed content. The service resolves the URL before bot creation and does not persist, return, or log the URL or image bytes.
     */
    #[Required]
    public string $url;

    /**
     * `new MeetingSessionCameraImageURLSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionCameraImageURLSource::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionCameraImageURLSource)->withURL(...)
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
    public static function with(string $url): self
    {
        $self = new self;

        $self['url'] = $url;

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

    /**
     * Public HTTPS JPEG URL with at most 2,048 characters and no credentials, fragment, surrounding whitespace, raw control characters, or explicit non-default port. Signed queries are allowed but must be treated as credentials. Fetching is limited to public network destinations, a five-second timeout, no redirects, a 2xx image/jpeg response with identity or no content encoding, and a 1,363,148-byte limit enforced against both declared and streamed content. The service resolves the URL before bot creation and does not persist, return, or log the URL or image bytes.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
