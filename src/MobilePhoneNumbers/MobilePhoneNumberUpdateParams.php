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
 *   callForwarding?: CallForwarding|array{
 *     callForwardingEnabled?: bool|null,
 *     forwardingType?: value-of<ForwardingType>|null,
 *     forwardsTo?: string|null,
 *   },
 *   callRecording?: CallRecording|array{
 *     inboundCallRecordingChannels?: value-of<InboundCallRecordingChannels>|null,
 *     inboundCallRecordingEnabled?: bool|null,
 *     inboundCallRecordingFormat?: value-of<InboundCallRecordingFormat>|null,
 *   },
 *   callerIDNameEnabled?: bool,
 *   cnamListing?: CnamListing|array{
 *     cnamListingDetails?: string|null, cnamListingEnabled?: bool|null
 *   },
 *   connectionID?: string|null,
 *   customerReference?: string|null,
 *   inbound?: Inbound|array{interceptionAppID?: string|null},
 *   inboundCallScreening?: InboundCallScreening|value-of<InboundCallScreening>,
 *   noiseSuppression?: bool,
 *   outbound?: Outbound|array{interceptionAppID?: string|null},
 *   tags?: list<string>,
 * }
 */
final class MobilePhoneNumberUpdateParams implements BaseModel
{
    /** @use SdkModel<MobilePhoneNumberUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional('call_forwarding')]
    public ?CallForwarding $callForwarding;

    #[Optional('call_recording')]
    public ?CallRecording $callRecording;

    #[Optional('caller_id_name_enabled')]
    public ?bool $callerIDNameEnabled;

    #[Optional('cnam_listing')]
    public ?CnamListing $cnamListing;

    #[Optional('connection_id', nullable: true)]
    public ?string $connectionID;

    #[Optional('customer_reference', nullable: true)]
    public ?string $customerReference;

    #[Optional]
    public ?Inbound $inbound;

    /** @var value-of<InboundCallScreening>|null $inboundCallScreening */
    #[Optional('inbound_call_screening', enum: InboundCallScreening::class)]
    public ?string $inboundCallScreening;

    #[Optional('noise_suppression')]
    public ?bool $noiseSuppression;

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
     *   callForwardingEnabled?: bool|null,
     *   forwardingType?: value-of<ForwardingType>|null,
     *   forwardsTo?: string|null,
     * } $callForwarding
     * @param CallRecording|array{
     *   inboundCallRecordingChannels?: value-of<InboundCallRecordingChannels>|null,
     *   inboundCallRecordingEnabled?: bool|null,
     *   inboundCallRecordingFormat?: value-of<InboundCallRecordingFormat>|null,
     * } $callRecording
     * @param CnamListing|array{
     *   cnamListingDetails?: string|null, cnamListingEnabled?: bool|null
     * } $cnamListing
     * @param Inbound|array{interceptionAppID?: string|null} $inbound
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     * @param Outbound|array{interceptionAppID?: string|null} $outbound
     * @param list<string> $tags
     */
    public static function with(
        CallForwarding|array|null $callForwarding = null,
        CallRecording|array|null $callRecording = null,
        ?bool $callerIDNameEnabled = null,
        CnamListing|array|null $cnamListing = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        Inbound|array|null $inbound = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        ?bool $noiseSuppression = null,
        Outbound|array|null $outbound = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        null !== $callForwarding && $self['callForwarding'] = $callForwarding;
        null !== $callRecording && $self['callRecording'] = $callRecording;
        null !== $callerIDNameEnabled && $self['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListing && $self['cnamListing'] = $cnamListing;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $inboundCallScreening && $self['inboundCallScreening'] = $inboundCallScreening;
        null !== $noiseSuppression && $self['noiseSuppression'] = $noiseSuppression;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * @param CallForwarding|array{
     *   callForwardingEnabled?: bool|null,
     *   forwardingType?: value-of<ForwardingType>|null,
     *   forwardsTo?: string|null,
     * } $callForwarding
     */
    public function withCallForwarding(
        CallForwarding|array $callForwarding
    ): self {
        $self = clone $this;
        $self['callForwarding'] = $callForwarding;

        return $self;
    }

    /**
     * @param CallRecording|array{
     *   inboundCallRecordingChannels?: value-of<InboundCallRecordingChannels>|null,
     *   inboundCallRecordingEnabled?: bool|null,
     *   inboundCallRecordingFormat?: value-of<InboundCallRecordingFormat>|null,
     * } $callRecording
     */
    public function withCallRecording(CallRecording|array $callRecording): self
    {
        $self = clone $this;
        $self['callRecording'] = $callRecording;

        return $self;
    }

    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $self = clone $this;
        $self['callerIDNameEnabled'] = $callerIDNameEnabled;

        return $self;
    }

    /**
     * @param CnamListing|array{
     *   cnamListingDetails?: string|null, cnamListingEnabled?: bool|null
     * } $cnamListing
     */
    public function withCnamListing(CnamListing|array $cnamListing): self
    {
        $self = clone $this;
        $self['cnamListing'] = $cnamListing;

        return $self;
    }

    public function withConnectionID(?string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    public function withCustomerReference(?string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * @param Inbound|array{interceptionAppID?: string|null} $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     */
    public function withInboundCallScreening(
        InboundCallScreening|string $inboundCallScreening
    ): self {
        $self = clone $this;
        $self['inboundCallScreening'] = $inboundCallScreening;

        return $self;
    }

    public function withNoiseSuppression(bool $noiseSuppression): self
    {
        $self = clone $this;
        $self['noiseSuppression'] = $noiseSuppression;

        return $self;
    }

    /**
     * @param Outbound|array{interceptionAppID?: string|null} $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
