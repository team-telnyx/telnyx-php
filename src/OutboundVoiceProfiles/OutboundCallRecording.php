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
 *   callRecordingCallerPhoneNumbers?: list<string>,
 *   callRecordingChannels?: value-of<CallRecordingChannels>,
 *   callRecordingFormat?: value-of<CallRecordingFormat>,
 *   callRecordingType?: value-of<CallRecordingType>,
 * }
 */
final class OutboundCallRecording implements BaseModel
{
    /** @use SdkModel<OutboundCallRecordingShape> */
    use SdkModel;

    /**
     * When call_recording_type is 'by_caller_phone_number', only outbound calls using one of these numbers will be recorded. Numbers must be specified in E164 format.
     *
     * @var list<string>|null $callRecordingCallerPhoneNumbers
     */
    #[Api('call_recording_caller_phone_numbers', list: 'string', optional: true)]
    public ?array $callRecordingCallerPhoneNumbers;

    /**
     * When using 'dual' channels, the final audio file will be a stereo recording with the first leg on channel A, and the rest on channel B.
     *
     * @var value-of<CallRecordingChannels>|null $callRecordingChannels
     */
    #[Api(
        'call_recording_channels',
        enum: CallRecordingChannels::class,
        optional: true,
    )]
    public ?string $callRecordingChannels;

    /**
     * The audio file format for calls being recorded.
     *
     * @var value-of<CallRecordingFormat>|null $callRecordingFormat
     */
    #[Api(
        'call_recording_format',
        enum: CallRecordingFormat::class,
        optional: true
    )]
    public ?string $callRecordingFormat;

    /**
     * Specifies which calls are recorded.
     *
     * @var value-of<CallRecordingType>|null $callRecordingType
     */
    #[Api('call_recording_type', enum: CallRecordingType::class, optional: true)]
    public ?string $callRecordingType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $callRecordingCallerPhoneNumbers
     * @param CallRecordingChannels|value-of<CallRecordingChannels> $callRecordingChannels
     * @param CallRecordingFormat|value-of<CallRecordingFormat> $callRecordingFormat
     * @param CallRecordingType|value-of<CallRecordingType> $callRecordingType
     */
    public static function with(
        ?array $callRecordingCallerPhoneNumbers = null,
        CallRecordingChannels|string|null $callRecordingChannels = null,
        CallRecordingFormat|string|null $callRecordingFormat = null,
        CallRecordingType|string|null $callRecordingType = null,
    ): self {
        $obj = new self;

        null !== $callRecordingCallerPhoneNumbers && $obj->callRecordingCallerPhoneNumbers = $callRecordingCallerPhoneNumbers;
        null !== $callRecordingChannels && $obj['callRecordingChannels'] = $callRecordingChannels;
        null !== $callRecordingFormat && $obj['callRecordingFormat'] = $callRecordingFormat;
        null !== $callRecordingType && $obj['callRecordingType'] = $callRecordingType;

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
        $obj->callRecordingCallerPhoneNumbers = $callRecordingCallerPhoneNumbers;

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
        $obj['callRecordingChannels'] = $callRecordingChannels;

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
        $obj['callRecordingFormat'] = $callRecordingFormat;

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
        $obj['callRecordingType'] = $callRecordingType;

        return $obj;
    }
}
