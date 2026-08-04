<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DomainsTrackingSettingsShape = array{
 *   clickTracking?: bool|null,
 *   openTracking?: bool|null,
 *   unsubscribeTracking?: bool|null,
 * }
 */
final class DomainsTrackingSettings implements BaseModel
{
    /** @use SdkModel<DomainsTrackingSettingsShape> */
    use SdkModel;

    /**
     * Rewrite HTML links through a tracking redirect to record click events.
     */
    #[Optional('click_tracking')]
    public ?bool $clickTracking;

    /**
     * Inject a tracking pixel into HTML messages to record open events.
     */
    #[Optional('open_tracking')]
    public ?bool $openTracking;

    /**
     * Add RFC 8058 List-Unsubscribe headers with a signed one-click unsubscribe URL. Enabled by default; Gmail/Yahoo bulk-sender rules require one-click unsubscribe support.
     */
    #[Optional('unsubscribe_tracking')]
    public ?bool $unsubscribeTracking;

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
        ?bool $openTracking = null,
        ?bool $unsubscribeTracking = null,
    ): self {
        $self = new self;

        null !== $clickTracking && $self['clickTracking'] = $clickTracking;
        null !== $openTracking && $self['openTracking'] = $openTracking;
        null !== $unsubscribeTracking && $self['unsubscribeTracking'] = $unsubscribeTracking;

        return $self;
    }

    /**
     * Rewrite HTML links through a tracking redirect to record click events.
     */
    public function withClickTracking(bool $clickTracking): self
    {
        $self = clone $this;
        $self['clickTracking'] = $clickTracking;

        return $self;
    }

    /**
     * Inject a tracking pixel into HTML messages to record open events.
     */
    public function withOpenTracking(bool $openTracking): self
    {
        $self = clone $this;
        $self['openTracking'] = $openTracking;

        return $self;
    }

    /**
     * Add RFC 8058 List-Unsubscribe headers with a signed one-click unsubscribe URL. Enabled by default; Gmail/Yahoo bulk-sender rules require one-click unsubscribe support.
     */
    public function withUnsubscribeTracking(bool $unsubscribeTracking): self
    {
        $self = clone $this;
        $self['unsubscribeTracking'] = $unsubscribeTracking;

        return $self;
    }
}
