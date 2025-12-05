<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallRecording\InboundCallRecordingChannels;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallRecording\InboundCallRecordingFormat;

/**
 * @phpstan-type CallRecordingShape = array{
 *   inbound_call_recording_channels?: value-of<InboundCallRecordingChannels>|null,
 *   inbound_call_recording_enabled?: bool|null,
 *   inbound_call_recording_format?: value-of<InboundCallRecordingFormat>|null,
 * }
 */
final class CallRecording implements BaseModel
{
    /** @use SdkModel<CallRecordingShape> */
    use SdkModel;

    /**
     * @var value-of<InboundCallRecordingChannels>|null $inbound_call_recording_channels
     */
    #[Api(enum: InboundCallRecordingChannels::class, optional: true)]
    public ?string $inbound_call_recording_channels;

    #[Api(optional: true)]
    public ?bool $inbound_call_recording_enabled;

    /** @var value-of<InboundCallRecordingFormat>|null $inbound_call_recording_format */
    #[Api(enum: InboundCallRecordingFormat::class, optional: true)]
    public ?string $inbound_call_recording_format;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InboundCallRecordingChannels|value-of<InboundCallRecordingChannels> $inbound_call_recording_channels
     * @param InboundCallRecordingFormat|value-of<InboundCallRecordingFormat> $inbound_call_recording_format
     */
    public static function with(
        InboundCallRecordingChannels|string|null $inbound_call_recording_channels = null,
        ?bool $inbound_call_recording_enabled = null,
        InboundCallRecordingFormat|string|null $inbound_call_recording_format = null,
    ): self {
        $obj = new self;

        null !== $inbound_call_recording_channels && $obj['inbound_call_recording_channels'] = $inbound_call_recording_channels;
        null !== $inbound_call_recording_enabled && $obj['inbound_call_recording_enabled'] = $inbound_call_recording_enabled;
        null !== $inbound_call_recording_format && $obj['inbound_call_recording_format'] = $inbound_call_recording_format;

        return $obj;
    }

    /**
     * @param InboundCallRecordingChannels|value-of<InboundCallRecordingChannels> $inboundCallRecordingChannels
     */
    public function withInboundCallRecordingChannels(
        InboundCallRecordingChannels|string $inboundCallRecordingChannels
    ): self {
        $obj = clone $this;
        $obj['inbound_call_recording_channels'] = $inboundCallRecordingChannels;

        return $obj;
    }

    public function withInboundCallRecordingEnabled(
        bool $inboundCallRecordingEnabled
    ): self {
        $obj = clone $this;
        $obj['inbound_call_recording_enabled'] = $inboundCallRecordingEnabled;

        return $obj;
    }

    /**
     * @param InboundCallRecordingFormat|value-of<InboundCallRecordingFormat> $inboundCallRecordingFormat
     */
    public function withInboundCallRecordingFormat(
        InboundCallRecordingFormat|string $inboundCallRecordingFormat
    ): self {
        $obj = clone $this;
        $obj['inbound_call_recording_format'] = $inboundCallRecordingFormat;

        return $obj;
    }
}
