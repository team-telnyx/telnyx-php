<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingChannels;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingFormat;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingType;

/**
 * @phpstan-type OutboundCallRecordingShape = array{
 *   call_recording_caller_phone_numbers?: list<string>|null,
 *   call_recording_channels?: value-of<CallRecordingChannels>|null,
 *   call_recording_format?: value-of<CallRecordingFormat>|null,
 *   call_recording_type?: value-of<CallRecordingType>|null,
 * }
 */
final class OutboundCallRecording implements BaseModel
{
    /** @use SdkModel<OutboundCallRecordingShape> */
    use SdkModel;

    /**
     * When call_recording_type is 'by_caller_phone_number', only outbound calls using one of these numbers will be recorded. Numbers must be specified in E164 format.
     *
     * @var list<string>|null $call_recording_caller_phone_numbers
     */
    #[Api(list: 'string', optional: true)]
    public ?array $call_recording_caller_phone_numbers;

    /**
     * When using 'dual' channels, the final audio file will be a stereo recording with the first leg on channel A, and the rest on channel B.
     *
     * @var value-of<CallRecordingChannels>|null $call_recording_channels
     */
    #[Api(enum: CallRecordingChannels::class, optional: true)]
    public ?string $call_recording_channels;

    /**
     * The audio file format for calls being recorded.
     *
     * @var value-of<CallRecordingFormat>|null $call_recording_format
     */
    #[Api(enum: CallRecordingFormat::class, optional: true)]
    public ?string $call_recording_format;

    /**
     * Specifies which calls are recorded.
     *
     * @var value-of<CallRecordingType>|null $call_recording_type
     */
    #[Api(enum: CallRecordingType::class, optional: true)]
    public ?string $call_recording_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $call_recording_caller_phone_numbers
     * @param CallRecordingChannels|value-of<CallRecordingChannels> $call_recording_channels
     * @param CallRecordingFormat|value-of<CallRecordingFormat> $call_recording_format
     * @param CallRecordingType|value-of<CallRecordingType> $call_recording_type
     */
    public static function with(
        ?array $call_recording_caller_phone_numbers = null,
        CallRecordingChannels|string|null $call_recording_channels = null,
        CallRecordingFormat|string|null $call_recording_format = null,
        CallRecordingType|string|null $call_recording_type = null,
    ): self {
        $obj = new self;

        null !== $call_recording_caller_phone_numbers && $obj->call_recording_caller_phone_numbers = $call_recording_caller_phone_numbers;
        null !== $call_recording_channels && $obj['call_recording_channels'] = $call_recording_channels;
        null !== $call_recording_format && $obj['call_recording_format'] = $call_recording_format;
        null !== $call_recording_type && $obj['call_recording_type'] = $call_recording_type;

        return $obj;
    }

    /**
     * When call_recording_type is 'by_caller_phone_number', only outbound calls using one of these numbers will be recorded. Numbers must be specified in E164 format.
     *
     * @param list<string> $callRecordingCallerPhoneNumbers
     */
    public function withCallRecordingCallerPhoneNumbers(
        array $callRecordingCallerPhoneNumbers
    ): self {
        $obj = clone $this;
        $obj->call_recording_caller_phone_numbers = $callRecordingCallerPhoneNumbers;

        return $obj;
    }

    /**
     * When using 'dual' channels, the final audio file will be a stereo recording with the first leg on channel A, and the rest on channel B.
     *
     * @param CallRecordingChannels|value-of<CallRecordingChannels> $callRecordingChannels
     */
    public function withCallRecordingChannels(
        CallRecordingChannels|string $callRecordingChannels
    ): self {
        $obj = clone $this;
        $obj['call_recording_channels'] = $callRecordingChannels;

        return $obj;
    }

    /**
     * The audio file format for calls being recorded.
     *
     * @param CallRecordingFormat|value-of<CallRecordingFormat> $callRecordingFormat
     */
    public function withCallRecordingFormat(
        CallRecordingFormat|string $callRecordingFormat
    ): self {
        $obj = clone $this;
        $obj['call_recording_format'] = $callRecordingFormat;

        return $obj;
    }

    /**
     * Specifies which calls are recorded.
     *
     * @param CallRecordingType|value-of<CallRecordingType> $callRecordingType
     */
    public function withCallRecordingType(
        CallRecordingType|string $callRecordingType
    ): self {
        $obj = clone $this;
        $obj['call_recording_type'] = $callRecordingType;

        return $obj;
    }
}
