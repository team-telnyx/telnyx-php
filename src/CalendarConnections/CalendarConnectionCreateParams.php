<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections;

use Telnyx\CalendarConnections\CalendarConnectionCreateParams\Platform;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start Google Calendar or Microsoft Outlook OAuth. Open oauth_url in a browser. No connection exists until authorization succeeds. The resulting connection is owned by the connecting user.
 *
 * @see Telnyx\Services\CalendarConnectionsService::create()
 *
 * @phpstan-type CalendarConnectionCreateParamsShape = array{
 *   platform: Platform|value-of<Platform>
 * }
 */
final class CalendarConnectionCreateParams implements BaseModel
{
    /** @use SdkModel<CalendarConnectionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Calendar provider: Google Calendar or Microsoft Outlook.
     *
     * @var value-of<Platform> $platform
     */
    #[Required(enum: Platform::class)]
    public string $platform;

    /**
     * `new CalendarConnectionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalendarConnectionCreateParams::with(platform: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CalendarConnectionCreateParams)->withPlatform(...)
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
     * @param Platform|value-of<Platform> $platform
     */
    public static function with(Platform|string $platform): self
    {
        $self = new self;

        $self['platform'] = $platform;

        return $self;
    }

    /**
     * Calendar provider: Google Calendar or Microsoft Outlook.
     *
     * @param Platform|value-of<Platform> $platform
     */
    public function withPlatform(Platform|string $platform): self
    {
        $self = clone $this;
        $self['platform'] = $platform;

        return $self;
    }
}
