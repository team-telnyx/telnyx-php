<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Per-send open and click tracking overrides. Omitted properties inherit the sender domain's tracking settings.
 *
 * @phpstan-type TrackingSettingsShape = array{
 *   clickTracking?: bool|null, openTracking?: bool|null
 * }
 */
final class TrackingSettings implements BaseModel
{
    /** @use SdkModel<TrackingSettingsShape> */
    use SdkModel;

    /**
     * Whether to rewrite links for click tracking in this message.
     */
    #[Optional('click_tracking')]
    public ?bool $clickTracking;

    /**
     * Whether to inject an open-tracking pixel for this message.
     */
    #[Optional('open_tracking')]
    public ?bool $openTracking;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $clickTracking = null,
        ?bool $openTracking = null
    ): self {
        $self = new self;

        null !== $clickTracking && $self['clickTracking'] = $clickTracking;
        null !== $openTracking && $self['openTracking'] = $openTracking;

        return $self;
    }

    /**
     * Whether to rewrite links for click tracking in this message.
     */
    public function withClickTracking(bool $clickTracking): self
    {
        $self = clone $this;
        $self['clickTracking'] = $clickTracking;

        return $self;
    }

    /**
     * Whether to inject an open-tracking pixel for this message.
     */
    public function withOpenTracking(bool $openTracking): self
    {
        $self = clone $this;
        $self['openTracking'] = $openTracking;

        return $self;
    }
}
