<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\CalendarConnectionNewResponse;

use Telnyx\CalendarConnections\CalendarConnectionNewResponse\Data\Platform;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   oauthURL: string,
 *   platform: Platform|value-of<Platform>,
 *   status: 'pending_oauth',
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Authorization has not completed.
     *
     * @var 'pending_oauth' $status
     */
    #[Required]
    public string $status = 'pending_oauth';

    /**
     * Open in a browser to authorize calendar access.
     */
    #[Required('oauth_url')]
    public string $oauthURL;

    /**
     * Calendar provider: Google Calendar or Microsoft Outlook.
     *
     * @var value-of<Platform> $platform
     */
    #[Required(enum: Platform::class)]
    public string $platform;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(oauthURL: ..., platform: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withOAuthURL(...)->withPlatform(...)
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
    public static function with(
        string $oauthURL,
        Platform|string $platform
    ): self {
        $self = new self;

        $self['oauthURL'] = $oauthURL;
        $self['platform'] = $platform;

        return $self;
    }

    /**
     * Open in a browser to authorize calendar access.
     */
    public function withOAuthURL(string $oauthURL): self
    {
        $self = clone $this;
        $self['oauthURL'] = $oauthURL;

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

    /**
     * Authorization has not completed.
     *
     * @param 'pending_oauth' $status
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
