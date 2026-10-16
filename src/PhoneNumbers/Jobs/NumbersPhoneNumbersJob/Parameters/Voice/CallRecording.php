<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type CallRecordingShape = array{
 *   inboundCallRecordingChannels?: string|null,
 *   inboundCallRecordingEnabled?: bool|null,
 *   inboundCallRecordingFormat?: string|null,
 *   recordContinueOnHold?: bool|null,
 * }
 */
final class CallRecording implements BaseModel
{
    /** @use SdkModel<CallRecordingShape> */
    use SdkModel;

    /**
     * Saved inbound_call_recording_channels setting.
     */
    #[Optional('inbound_call_recording_channels', nullable: true)]
    public ?string $inboundCallRecordingChannels;

    /**
     * Saved inbound_call_recording_enabled setting.
     */
    #[Optional('inbound_call_recording_enabled', nullable: true)]
    public ?bool $inboundCallRecordingEnabled;

    /**
     * Saved inbound_call_recording_format setting.
     */
    #[Optional('inbound_call_recording_format', nullable: true)]
    public ?string $inboundCallRecordingFormat;

    /**
     * Saved record_continue_on_hold setting.
     */
    #[Optional('record_continue_on_hold', nullable: true)]
    public ?bool $recordContinueOnHold;

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
        string|Omitted|null $inboundCallRecordingChannels = Omitted::VALUE,
        bool|Omitted|null $inboundCallRecordingEnabled = Omitted::VALUE,
        string|Omitted|null $inboundCallRecordingFormat = Omitted::VALUE,
        bool|Omitted|null $recordContinueOnHold = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $inboundCallRecordingChannels && $self['inboundCallRecordingChannels'] = $inboundCallRecordingChannels;
        Omitted::VALUE !== $inboundCallRecordingEnabled && $self['inboundCallRecordingEnabled'] = $inboundCallRecordingEnabled;
        Omitted::VALUE !== $inboundCallRecordingFormat && $self['inboundCallRecordingFormat'] = $inboundCallRecordingFormat;
        Omitted::VALUE !== $recordContinueOnHold && $self['recordContinueOnHold'] = $recordContinueOnHold;

        return $self;
    }

    /**
     * Saved inbound_call_recording_channels setting.
     */
    public function withInboundCallRecordingChannels(
        ?string $inboundCallRecordingChannels
    ): self {
        $self = clone $this;
        $self['inboundCallRecordingChannels'] = $inboundCallRecordingChannels;

        return $self;
    }

    /**
     * Saved inbound_call_recording_enabled setting.
     */
    public function withInboundCallRecordingEnabled(
        ?bool $inboundCallRecordingEnabled
    ): self {
        $self = clone $this;
        $self['inboundCallRecordingEnabled'] = $inboundCallRecordingEnabled;

        return $self;
    }

    /**
     * Saved inbound_call_recording_format setting.
     */
    public function withInboundCallRecordingFormat(
        ?string $inboundCallRecordingFormat
    ): self {
        $self = clone $this;
        $self['inboundCallRecordingFormat'] = $inboundCallRecordingFormat;

        return $self;
    }

    /**
     * Saved record_continue_on_hold setting.
     */
    public function withRecordContinueOnHold(?bool $recordContinueOnHold): self
    {
        $self = clone $this;
        $self['recordContinueOnHold'] = $recordContinueOnHold;

        return $self;
    }
}
