<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledCallSettings\SipRegion;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Per-call telephony overrides applied when a scheduled phone-call event
 * dispatches. Phone-call events only. New per-call dispatch options should be
 * added here rather than as top-level event fields.
 *
 * @phpstan-type ScheduledCallSettingsShape = array{
 *   sipRegion?: null|SipRegion|value-of<SipRegion>
 * }
 */
final class ScheduledCallSettings implements BaseModel
{
    /** @use SdkModel<ScheduledCallSettingsShape> */
    use SdkModel;

    /**
     * SIP region passed to Telnyx when initiating an outbound call. Values
     * match the Telnyx TeXML `SipRegion` parameter exactly. Telnyx defaults to
     * `US` when omitted.
     *
     * @var value-of<SipRegion>|null $sipRegion
     */
    #[Optional('sip_region', enum: SipRegion::class)]
    public ?string $sipRegion;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SipRegion|value-of<SipRegion>|null $sipRegion
     */
    public static function with(SipRegion|string|null $sipRegion = null): self
    {
        $self = new self;

        null !== $sipRegion && $self['sipRegion'] = $sipRegion;

        return $self;
    }

    /**
     * SIP region passed to Telnyx when initiating an outbound call. Values
     * match the Telnyx TeXML `SipRegion` parameter exactly. Telnyx defaults to
     * `US` when omitted.
     *
     * @param SipRegion|value-of<SipRegion> $sipRegion
     */
    public function withSipRegion(SipRegion|string $sipRegion): self
    {
        $self = clone $this;
        $self['sipRegion'] = $sipRegion;

        return $self;
    }
}
