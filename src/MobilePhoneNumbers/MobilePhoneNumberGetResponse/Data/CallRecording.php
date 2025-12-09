<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallRecording\InboundCallRecordingChannels;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallRecording\InboundCallRecordingFormat;

/**
 * @phpstan-type CallRecordingShape = array{
 *   inboundCallRecordingChannels?: value-of<InboundCallRecordingChannels>|null,
 *   inboundCallRecordingEnabled?: bool|null,
 *   inboundCallRecordingFormat?: value-of<InboundCallRecordingFormat>|null,
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
        $obj = new self;

        null !== $inboundCallRecordingChannels && $obj['inboundCallRecordingChannels'] = $inboundCallRecordingChannels;
        null !== $inboundCallRecordingEnabled && $obj['inboundCallRecordingEnabled'] = $inboundCallRecordingEnabled;
        null !== $inboundCallRecordingFormat && $obj['inboundCallRecordingFormat'] = $inboundCallRecordingFormat;

        return $obj;
    }

    /**
     * @param InboundCallRecordingChannels|value-of<InboundCallRecordingChannels> $inboundCallRecordingChannels
     */
    public function withInboundCallRecordingChannels(
        InboundCallRecordingChannels|string $inboundCallRecordingChannels
    ): self {
        $obj = clone $this;
        $obj['inboundCallRecordingChannels'] = $inboundCallRecordingChannels;

        return $obj;
    }

    public function withInboundCallRecordingEnabled(
        bool $inboundCallRecordingEnabled
    ): self {
        $obj = clone $this;
        $obj['inboundCallRecordingEnabled'] = $inboundCallRecordingEnabled;

        return $obj;
    }

    /**
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
