<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording\InboundCallRecordingChannels;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording\InboundCallRecordingFormat;

/**
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

    /** @var value-of<InboundCallRecordingChannels>|null $inboundCallRecordingChannels */
    #[Optional(
        'inbound_call_recording_channels',
        enum: InboundCallRecordingChannels::class
    )]
    public ?string $inboundCallRecordingChannels;

    #[Optional('inbound_call_recording_enabled')]
    public ?bool $inboundCallRecordingEnabled;

    /** @var value-of<InboundCallRecordingFormat>|null $inboundCallRecordingFormat */
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
     * @param InboundCallRecordingChannels|value-of<InboundCallRecordingChannels> $inboundCallRecordingChannels
     * @param InboundCallRecordingFormat|value-of<InboundCallRecordingFormat> $inboundCallRecordingFormat
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
     * @param InboundCallRecordingChannels|value-of<InboundCallRecordingChannels> $inboundCallRecordingChannels
     */
    public function withInboundCallRecordingChannels(
        InboundCallRecordingChannels|string $inboundCallRecordingChannels
    ): self {
        $self = clone $this;
        $self['inboundCallRecordingChannels'] = $inboundCallRecordingChannels;

        return $self;
    }

    public function withInboundCallRecordingEnabled(
        bool $inboundCallRecordingEnabled
    ): self {
        $self = clone $this;
        $self['inboundCallRecordingEnabled'] = $inboundCallRecordingEnabled;

        return $self;
    }

    /**
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
