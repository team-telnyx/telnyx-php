<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingChannels;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingFormat;

/**
 * The call recording settings for a phone number.
 *
 * @phpstan-type CallRecordingShape = array{
 *   inboundCallRecordingChannels?: value-of<InboundCallRecordingChannels>,
 *   inboundCallRecordingEnabled?: bool,
 *   inboundCallRecordingFormat?: value-of<InboundCallRecordingFormat>,
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
    #[Api(
        'inbound_call_recording_channels',
        enum: InboundCallRecordingChannels::class,
        optional: true,
    )]
    public ?string $inboundCallRecordingChannels;

    /**
     * When enabled, any inbound call to this number will be recorded.
     */
    #[Api('inbound_call_recording_enabled', optional: true)]
    public ?bool $inboundCallRecordingEnabled;

    /**
     * The audio file format for calls being recorded.
     *
     * @var value-of<InboundCallRecordingFormat>|null $inboundCallRecordingFormat
     */
    #[Api(
        'inbound_call_recording_format',
        enum: InboundCallRecordingFormat::class,
        optional: true,
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
        $obj = new self;

        null !== $inboundCallRecordingChannels && $obj['inboundCallRecordingChannels'] = $inboundCallRecordingChannels;
        null !== $inboundCallRecordingEnabled && $obj->inboundCallRecordingEnabled = $inboundCallRecordingEnabled;
        null !== $inboundCallRecordingFormat && $obj['inboundCallRecordingFormat'] = $inboundCallRecordingFormat;

        return $obj;
    }

    /**
     * When using 'dual' channels, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B.
     *
     * @param InboundCallRecordingChannels|value-of<InboundCallRecordingChannels> $inboundCallRecordingChannels
     */
    public function withInboundCallRecordingChannels(
        InboundCallRecordingChannels|string $inboundCallRecordingChannels
    ): self {
        $obj = clone $this;
        $obj['inboundCallRecordingChannels'] = $inboundCallRecordingChannels;

        return $obj;
    }

    /**
     * When enabled, any inbound call to this number will be recorded.
     */
    public function withInboundCallRecordingEnabled(
        bool $inboundCallRecordingEnabled
    ): self {
        $obj = clone $this;
        $obj->inboundCallRecordingEnabled = $inboundCallRecordingEnabled;

        return $obj;
    }

    /**
     * The audio file format for calls being recorded.
     *
     * @param InboundCallRecordingFormat|value-of<InboundCallRecordingFormat> $inboundCallRecordingFormat
     */
    public function withInboundCallRecordingFormat(
        InboundCallRecordingFormat|string $inboundCallRecordingFormat
    ): self {
        $obj = clone $this;
        $obj['inboundCallRecordingFormat'] = $inboundCallRecordingFormat;

        return $obj;
    }
}
