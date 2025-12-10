<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallForwarding\ForwardingType;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallRecording\InboundCallRecordingChannels;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallRecording\InboundCallRecordingFormat;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\NoiseSuppression;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\Outbound;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   callForwarding?: CallForwarding|null,
 *   callRecording?: CallRecording|null,
 *   callerIDNameEnabled?: bool|null,
 *   cnamListing?: CnamListing|null,
 *   connectionID?: string|null,
 *   connectionName?: string|null,
 *   connectionType?: string|null,
 *   countryISOAlpha2?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   inbound?: Inbound|null,
 *   inboundCallScreening?: value-of<InboundCallScreening>|null,
 *   mobileVoiceEnabled?: bool|null,
 *   noiseSuppression?: value-of<NoiseSuppression>|null,
 *   outbound?: Outbound|null,
 *   phoneNumber?: string|null,
 *   recordType?: string|null,
 *   simCardID?: string|null,
 *   status?: string|null,
 *   tags?: list<string>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    #[Optional('call_forwarding')]
    public ?CallForwarding $callForwarding;

    #[Optional('call_recording')]
    public ?CallRecording $callRecording;

    /**
     * Indicates if caller ID name is enabled.
     */
    #[Optional('caller_id_name_enabled')]
    public ?bool $callerIDNameEnabled;

    #[Optional('cnam_listing')]
    public ?CnamListing $cnamListing;

    /**
     * The ID of the connection associated with this number.
     */
    #[Optional('connection_id', nullable: true)]
    public ?string $connectionID;

    /**
     * The name of the connection.
     */
    #[Optional('connection_name', nullable: true)]
    public ?string $connectionName;

    /**
     * The type of the connection.
     */
    #[Optional('connection_type', nullable: true)]
    public ?string $connectionType;

    /**
     * The ISO 3166-1 alpha-2 country code of the number.
     */
    #[Optional('country_iso_alpha2')]
    public ?string $countryISOAlpha2;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * A customer reference string.
     */
    #[Optional('customer_reference', nullable: true)]
    public ?string $customerReference;

    #[Optional]
    public ?Inbound $inbound;

    /**
     * The inbound call screening setting.
     *
     * @var value-of<InboundCallScreening>|null $inboundCallScreening
     */
    #[Optional(
        'inbound_call_screening',
        enum: InboundCallScreening::class,
        nullable: true
    )]
    public ?string $inboundCallScreening;

    /**
     * Indicates if mobile voice is enabled.
     */
    #[Optional('mobile_voice_enabled')]
    public ?bool $mobileVoiceEnabled;

    /**
     * The noise suppression setting.
     *
     * @var value-of<NoiseSuppression>|null $noiseSuppression
     */
    #[Optional('noise_suppression', enum: NoiseSuppression::class)]
    public ?string $noiseSuppression;

    #[Optional]
    public ?Outbound $outbound;

    /**
     * The +E.164-formatted phone number.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The ID of the SIM card associated with this number.
     */
    #[Optional('sim_card_id')]
    public ?string $simCardID;

    /**
     * The status of the phone number.
     */
    #[Optional]
    public ?string $status;

    /**
     * A list of tags associated with the number.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
     * @param Inbound|array{
     *   interceptionAppID?: string|null, interceptionAppName?: string|null
     * } $inbound
     * @param InboundCallScreening|value-of<InboundCallScreening>|null $inboundCallScreening
     * @param NoiseSuppression|value-of<NoiseSuppression> $noiseSuppression
     * @param Outbound|array{
     *   interceptionAppID?: string|null, interceptionAppName?: string|null
     * } $outbound
     * @param list<string> $tags
     */
    public static function with(
        ?string $id = null,
        CallForwarding|array|null $callForwarding = null,
        CallRecording|array|null $callRecording = null,
        ?bool $callerIDNameEnabled = null,
        CnamListing|array|null $cnamListing = null,
        ?string $connectionID = null,
        ?string $connectionName = null,
        ?string $connectionType = null,
        ?string $countryISOAlpha2 = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        Inbound|array|null $inbound = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        ?bool $mobileVoiceEnabled = null,
        NoiseSuppression|string|null $noiseSuppression = null,
        Outbound|array|null $outbound = null,
        ?string $phoneNumber = null,
        ?string $recordType = null,
        ?string $simCardID = null,
        ?string $status = null,
        ?array $tags = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $callForwarding && $self['callForwarding'] = $callForwarding;
        null !== $callRecording && $self['callRecording'] = $callRecording;
        null !== $callerIDNameEnabled && $self['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListing && $self['cnamListing'] = $cnamListing;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $connectionType && $self['connectionType'] = $connectionType;
        null !== $countryISOAlpha2 && $self['countryISOAlpha2'] = $countryISOAlpha2;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $inboundCallScreening && $self['inboundCallScreening'] = $inboundCallScreening;
        null !== $mobileVoiceEnabled && $self['mobileVoiceEnabled'] = $mobileVoiceEnabled;
        null !== $noiseSuppression && $self['noiseSuppression'] = $noiseSuppression;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $simCardID && $self['simCardID'] = $simCardID;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    /**
     * Indicates if caller ID name is enabled.
     */
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

    /**
     * The ID of the connection associated with this number.
     */
    public function withConnectionID(?string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * The name of the connection.
     */
    public function withConnectionName(?string $connectionName): self
    {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * The type of the connection.
     */
    public function withConnectionType(?string $connectionType): self
    {
        $self = clone $this;
        $self['connectionType'] = $connectionType;

        return $self;
    }

    /**
     * The ISO 3166-1 alpha-2 country code of the number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $self = clone $this;
        $self['countryISOAlpha2'] = $countryISOAlpha2;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A customer reference string.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * @param Inbound|array{
     *   interceptionAppID?: string|null, interceptionAppName?: string|null
     * } $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * The inbound call screening setting.
     *
     * @param InboundCallScreening|value-of<InboundCallScreening>|null $inboundCallScreening
     */
    public function withInboundCallScreening(
        InboundCallScreening|string|null $inboundCallScreening
    ): self {
        $self = clone $this;
        $self['inboundCallScreening'] = $inboundCallScreening;

        return $self;
    }

    /**
     * Indicates if mobile voice is enabled.
     */
    public function withMobileVoiceEnabled(bool $mobileVoiceEnabled): self
    {
        $self = clone $this;
        $self['mobileVoiceEnabled'] = $mobileVoiceEnabled;

        return $self;
    }

    /**
     * The noise suppression setting.
     *
     * @param NoiseSuppression|value-of<NoiseSuppression> $noiseSuppression
     */
    public function withNoiseSuppression(
        NoiseSuppression|string $noiseSuppression
    ): self {
        $self = clone $this;
        $self['noiseSuppression'] = $noiseSuppression;

        return $self;
    }

    /**
     * @param Outbound|array{
     *   interceptionAppID?: string|null, interceptionAppName?: string|null
     * } $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

        return $self;
    }

    /**
     * The +E.164-formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The ID of the SIM card associated with this number.
     */
    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * The status of the phone number.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * A list of tags associated with the number.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
