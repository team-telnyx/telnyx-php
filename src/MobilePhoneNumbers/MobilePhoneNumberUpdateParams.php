<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding\ForwardingType;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording\InboundCallRecordingChannels;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording\InboundCallRecordingFormat;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Outbound;

/**
 * Update a Mobile Phone Number.
 *
 * @see Telnyx\Services\MobilePhoneNumbersService::update()
 *
 * @phpstan-type MobilePhoneNumberUpdateParamsShape = array{
 *   call_forwarding?: CallForwarding|array{
 *     call_forwarding_enabled?: bool|null,
 *     forwarding_type?: value-of<ForwardingType>|null,
 *     forwards_to?: string|null,
 *   },
 *   call_recording?: CallRecording|array{
 *     inbound_call_recording_channels?: value-of<InboundCallRecordingChannels>|null,
 *     inbound_call_recording_enabled?: bool|null,
 *     inbound_call_recording_format?: value-of<InboundCallRecordingFormat>|null,
 *   },
 *   caller_id_name_enabled?: bool,
 *   cnam_listing?: CnamListing|array{
 *     cnam_listing_details?: string|null, cnam_listing_enabled?: bool|null
 *   },
 *   connection_id?: string|null,
 *   customer_reference?: string|null,
 *   inbound?: Inbound|array{interception_app_id?: string|null},
 *   inbound_call_screening?: InboundCallScreening|value-of<InboundCallScreening>,
 *   noise_suppression?: bool,
 *   outbound?: Outbound|array{interception_app_id?: string|null},
 *   tags?: list<string>,
 * }
 */
final class MobilePhoneNumberUpdateParams implements BaseModel
{
    /** @use SdkModel<MobilePhoneNumberUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?CallForwarding $call_forwarding;

    #[Optional]
    public ?CallRecording $call_recording;

    #[Optional]
    public ?bool $caller_id_name_enabled;

    #[Optional]
    public ?CnamListing $cnam_listing;

    #[Optional(nullable: true)]
    public ?string $connection_id;

    #[Optional(nullable: true)]
    public ?string $customer_reference;

    #[Optional]
    public ?Inbound $inbound;

    /** @var value-of<InboundCallScreening>|null $inbound_call_screening */
    #[Optional(enum: InboundCallScreening::class)]
    public ?string $inbound_call_screening;

    #[Optional]
    public ?bool $noise_suppression;

    #[Optional]
    public ?Outbound $outbound;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallForwarding|array{
     *   call_forwarding_enabled?: bool|null,
     *   forwarding_type?: value-of<ForwardingType>|null,
     *   forwards_to?: string|null,
     * } $call_forwarding
     * @param CallRecording|array{
     *   inbound_call_recording_channels?: value-of<InboundCallRecordingChannels>|null,
     *   inbound_call_recording_enabled?: bool|null,
     *   inbound_call_recording_format?: value-of<InboundCallRecordingFormat>|null,
     * } $call_recording
     * @param CnamListing|array{
     *   cnam_listing_details?: string|null, cnam_listing_enabled?: bool|null
     * } $cnam_listing
     * @param Inbound|array{interception_app_id?: string|null} $inbound
     * @param InboundCallScreening|value-of<InboundCallScreening> $inbound_call_screening
     * @param Outbound|array{interception_app_id?: string|null} $outbound
     * @param list<string> $tags
     */
    public static function with(
        CallForwarding|array|null $call_forwarding = null,
        CallRecording|array|null $call_recording = null,
        ?bool $caller_id_name_enabled = null,
        CnamListing|array|null $cnam_listing = null,
        ?string $connection_id = null,
        ?string $customer_reference = null,
        Inbound|array|null $inbound = null,
        InboundCallScreening|string|null $inbound_call_screening = null,
        ?bool $noise_suppression = null,
        Outbound|array|null $outbound = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $call_forwarding && $obj['call_forwarding'] = $call_forwarding;
        null !== $call_recording && $obj['call_recording'] = $call_recording;
        null !== $caller_id_name_enabled && $obj['caller_id_name_enabled'] = $caller_id_name_enabled;
        null !== $cnam_listing && $obj['cnam_listing'] = $cnam_listing;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $inbound_call_screening && $obj['inbound_call_screening'] = $inbound_call_screening;
        null !== $noise_suppression && $obj['noise_suppression'] = $noise_suppression;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $tags && $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * @param CallForwarding|array{
     *   call_forwarding_enabled?: bool|null,
     *   forwarding_type?: value-of<ForwardingType>|null,
     *   forwards_to?: string|null,
     * } $callForwarding
     */
    public function withCallForwarding(
        CallForwarding|array $callForwarding
    ): self {
        $obj = clone $this;
        $obj['call_forwarding'] = $callForwarding;

        return $obj;
    }

    /**
     * @param CallRecording|array{
     *   inbound_call_recording_channels?: value-of<InboundCallRecordingChannels>|null,
     *   inbound_call_recording_enabled?: bool|null,
     *   inbound_call_recording_format?: value-of<InboundCallRecordingFormat>|null,
     * } $callRecording
     */
    public function withCallRecording(CallRecording|array $callRecording): self
    {
        $obj = clone $this;
        $obj['call_recording'] = $callRecording;

        return $obj;
    }

    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $obj = clone $this;
        $obj['caller_id_name_enabled'] = $callerIDNameEnabled;

        return $obj;
    }

    /**
     * @param CnamListing|array{
     *   cnam_listing_details?: string|null, cnam_listing_enabled?: bool|null
     * } $cnamListing
     */
    public function withCnamListing(CnamListing|array $cnamListing): self
    {
        $obj = clone $this;
        $obj['cnam_listing'] = $cnamListing;

        return $obj;
    }

    public function withConnectionID(?string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    public function withCustomerReference(?string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * @param Inbound|array{interception_app_id?: string|null} $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     */
    public function withInboundCallScreening(
        InboundCallScreening|string $inboundCallScreening
    ): self {
        $obj = clone $this;
        $obj['inbound_call_screening'] = $inboundCallScreening;

        return $obj;
    }

    public function withNoiseSuppression(bool $noiseSuppression): self
    {
        $obj = clone $this;
        $obj['noise_suppression'] = $noiseSuppression;

        return $obj;
    }

    /**
     * @param Outbound|array{interception_app_id?: string|null} $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }
}
