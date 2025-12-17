<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingChannels;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingFormat;

/**
 * The call recording settings for a phone number.
 *
 * @phpstan-type CallRecordingShape = array{
 *   inboundCallRecordingChannels?: null|InboundCallRecordingChannels|value-of<InboundCallRecordingChannels>,
 *   inboundCallRecordingEnabled?: bool|null,
 *   inboundCallRecordingFormat?: null|InboundCallRecordingFormat|value-of<InboundCallRecordingFormat>,
 * }
 */
final class CallRecording implements BaseModel
{
    /** @use SdkModel<CallRecordingShape> */
    use SdkModel;

    /**
     * When using 'dual' channels, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B.
     *
     * @var value-of<InboundCallRecordingChannels>|null $inboundCallRecordingChannels
     */
    #[Optional(
        'inbound_call_recording_channels',
        enum: InboundCallRecordingChannels::class
    )]
    public ?string $inboundCallRecordingChannels;

    /**
     * When enabled, any inbound call to this number will be recorded.
     */
    #[Optional('inbound_call_recording_enabled')]
    public ?bool $inboundCallRecordingEnabled;

    /**
     * The audio file format for calls being recorded.
     *
     * @var value-of<InboundCallRecordingFormat>|null $inboundCallRecordingFormat
     */
    #[Optional(
        'inbound_call_recording_format',
        enum: InboundCallRecordingFormat::class
    )]
    public ?string $inboundCallRecordingFormat;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InboundCallRecordingChannels|value-of<InboundCallRecordingChannels>|null $inboundCallRecordingChannels
     * @param InboundCallRecordingFormat|value-of<InboundCallRecordingFormat>|null $inboundCallRecordingFormat
     */
    public static function with(
        InboundCallRecordingChannels|string|null $inboundCallRecordingChannels = null,
        ?bool $inboundCallRecordingEnabled = null,
        InboundCallRecordingFormat|string|null $inboundCallRecordingFormat = null,
    ): self {
        $self = new self;

        null !== $inboundCallRecordingChannels && $self['inboundCallRecordingChannels'] = $inboundCallRecordingChannels;
        null !== $inboundCallRecordingEnabled && $self['inboundCallRecordingEnabled'] = $inboundCallRecordingEnabled;
        null !== $inboundCallRecordingFormat && $self['inboundCallRecordingFormat'] = $inboundCallRecordingFormat;

        return $self;
    }

    /**
     * When using 'dual' channels, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B.
     *
     * @param InboundCallRecordingChannels|value-of<InboundCallRecordingChannels> $inboundCallRecordingChannels
     */
    public function withInboundCallRecordingChannels(
        InboundCallRecordingChannels|string $inboundCallRecordingChannels
    ): self {
        $self = clone $this;
        $self['inboundCallRecordingChannels'] = $inboundCallRecordingChannels;

        return $self;
    }

    /**
     * When enabled, any inbound call to this number will be recorded.
     */
    public function withInboundCallRecordingEnabled(
        bool $inboundCallRecordingEnabled
    ): self {
        $self = clone $this;
        $self['inboundCallRecordingEnabled'] = $inboundCallRecordingEnabled;

        return $self;
    }

    /**
     * The audio file format for calls being recorded.
     *
     * @param InboundCallRecordingFormat|value-of<InboundCallRecordingFormat> $inboundCallRecordingFormat
     */
    public function withInboundCallRecordingFormat(
        InboundCallRecordingFormat|string $inboundCallRecordingFormat
    ): self {
        $self = clone $this;
        $self['inboundCallRecordingFormat'] = $inboundCallRecordingFormat;

        return $self;
    }
}
