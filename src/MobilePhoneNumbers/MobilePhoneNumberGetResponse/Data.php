<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallForwarding\ForwardingType;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallRecording\InboundCallRecordingChannels;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallRecording\InboundCallRecordingFormat;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\NoiseSuppression;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\Outbound;

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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $callForwarding && $obj['callForwarding'] = $callForwarding;
        null !== $callRecording && $obj['callRecording'] = $callRecording;
        null !== $callerIDNameEnabled && $obj['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListing && $obj['cnamListing'] = $cnamListing;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $connectionName && $obj['connectionName'] = $connectionName;
        null !== $connectionType && $obj['connectionType'] = $connectionType;
        null !== $countryISOAlpha2 && $obj['countryISOAlpha2'] = $countryISOAlpha2;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $inboundCallScreening && $obj['inboundCallScreening'] = $inboundCallScreening;
        null !== $mobileVoiceEnabled && $obj['mobileVoiceEnabled'] = $mobileVoiceEnabled;
        null !== $noiseSuppression && $obj['noiseSuppression'] = $noiseSuppression;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $simCardID && $obj['simCardID'] = $simCardID;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
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
        $obj = clone $this;
        $obj['callForwarding'] = $callForwarding;

        return $obj;
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
        $obj = clone $this;
        $obj['callRecording'] = $callRecording;

        return $obj;
    }

    /**
     * Indicates if caller ID name is enabled.
     */
    public function withCallerIDNameEnabled(bool $callerIDNameEnabled): self
    {
        $obj = clone $this;
        $obj['callerIDNameEnabled'] = $callerIDNameEnabled;

        return $obj;
    }

    /**
     * @param CnamListing|array{
     *   cnamListingDetails?: string|null, cnamListingEnabled?: bool|null
     * } $cnamListing
     */
    public function withCnamListing(CnamListing|array $cnamListing): self
    {
        $obj = clone $this;
        $obj['cnamListing'] = $cnamListing;

        return $obj;
    }

    /**
     * The ID of the connection associated with this number.
     */
    public function withConnectionID(?string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * The name of the connection.
     */
    public function withConnectionName(?string $connectionName): self
    {
        $obj = clone $this;
        $obj['connectionName'] = $connectionName;

        return $obj;
    }

    /**
     * The type of the connection.
     */
    public function withConnectionType(?string $connectionType): self
    {
        $obj = clone $this;
        $obj['connectionType'] = $connectionType;

        return $obj;
    }

    /**
     * The ISO 3166-1 alpha-2 country code of the number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $obj = clone $this;
        $obj['countryISOAlpha2'] = $countryISOAlpha2;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * @param Inbound|array{
     *   interceptionAppID?: string|null, interceptionAppName?: string|null
     * } $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * The inbound call screening setting.
     *
     * @param InboundCallScreening|value-of<InboundCallScreening>|null $inboundCallScreening
     */
    public function withInboundCallScreening(
        InboundCallScreening|string|null $inboundCallScreening
    ): self {
        $obj = clone $this;
        $obj['inboundCallScreening'] = $inboundCallScreening;

        return $obj;
    }

    /**
     * Indicates if mobile voice is enabled.
     */
    public function withMobileVoiceEnabled(bool $mobileVoiceEnabled): self
    {
        $obj = clone $this;
        $obj['mobileVoiceEnabled'] = $mobileVoiceEnabled;

        return $obj;
    }

    /**
     * The noise suppression setting.
     *
     * @param NoiseSuppression|value-of<NoiseSuppression> $noiseSuppression
     */
    public function withNoiseSuppression(
        NoiseSuppression|string $noiseSuppression
    ): self {
        $obj = clone $this;
        $obj['noiseSuppression'] = $noiseSuppression;

        return $obj;
    }

    /**
     * @param Outbound|array{
     *   interceptionAppID?: string|null, interceptionAppName?: string|null
     * } $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * The +E.164-formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * The ID of the SIM card associated with this number.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['simCardID'] = $simCardID;

        return $obj;
    }

    /**
     * The status of the phone number.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * A list of tags associated with the number.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
