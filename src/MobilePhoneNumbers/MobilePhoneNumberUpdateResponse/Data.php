<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallForwarding\ForwardingType;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallRecording\InboundCallRecordingChannels;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallRecording\InboundCallRecordingFormat;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\NoiseSuppression;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\Outbound;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   call_forwarding?: CallForwarding|null,
 *   call_recording?: CallRecording|null,
 *   caller_id_name_enabled?: bool|null,
 *   cnam_listing?: CnamListing|null,
 *   connection_id?: string|null,
 *   connection_name?: string|null,
 *   connection_type?: string|null,
 *   country_iso_alpha2?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   customer_reference?: string|null,
 *   inbound?: Inbound|null,
 *   inbound_call_screening?: value-of<InboundCallScreening>|null,
 *   mobile_voice_enabled?: bool|null,
 *   noise_suppression?: value-of<NoiseSuppression>|null,
 *   outbound?: Outbound|null,
 *   phone_number?: string|null,
 *   record_type?: string|null,
 *   sim_card_id?: string|null,
 *   status?: string|null,
 *   tags?: list<string>|null,
 *   updated_at?: \DateTimeInterface|null,
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

    #[Optional]
    public ?CallForwarding $call_forwarding;

    #[Optional]
    public ?CallRecording $call_recording;

    /**
     * Indicates if caller ID name is enabled.
     */
    #[Optional]
    public ?bool $caller_id_name_enabled;

    #[Optional]
    public ?CnamListing $cnam_listing;

    /**
     * The ID of the connection associated with this number.
     */
    #[Optional(nullable: true)]
    public ?string $connection_id;

    /**
     * The name of the connection.
     */
    #[Optional(nullable: true)]
    public ?string $connection_name;

    /**
     * The type of the connection.
     */
    #[Optional(nullable: true)]
    public ?string $connection_type;

    /**
     * The ISO 3166-1 alpha-2 country code of the number.
     */
    #[Optional]
    public ?string $country_iso_alpha2;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * A customer reference string.
     */
    #[Optional(nullable: true)]
    public ?string $customer_reference;

    #[Optional]
    public ?Inbound $inbound;

    /**
     * The inbound call screening setting.
     *
     * @var value-of<InboundCallScreening>|null $inbound_call_screening
     */
    #[Optional(enum: InboundCallScreening::class, nullable: true)]
    public ?string $inbound_call_screening;

    /**
     * Indicates if mobile voice is enabled.
     */
    #[Optional]
    public ?bool $mobile_voice_enabled;

    /**
     * The noise suppression setting.
     *
     * @var value-of<NoiseSuppression>|null $noise_suppression
     */
    #[Optional(enum: NoiseSuppression::class)]
    public ?string $noise_suppression;

    #[Optional]
    public ?Outbound $outbound;

    /**
     * The +E.164-formatted phone number.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * The ID of the SIM card associated with this number.
     */
    #[Optional]
    public ?string $sim_card_id;

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
    #[Optional]
    public ?\DateTimeInterface $updated_at;

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
     * @param Inbound|array{
     *   interception_app_id?: string|null, interception_app_name?: string|null
     * } $inbound
     * @param InboundCallScreening|value-of<InboundCallScreening>|null $inbound_call_screening
     * @param NoiseSuppression|value-of<NoiseSuppression> $noise_suppression
     * @param Outbound|array{
     *   interception_app_id?: string|null, interception_app_name?: string|null
     * } $outbound
     * @param list<string> $tags
     */
    public static function with(
        ?string $id = null,
        CallForwarding|array|null $call_forwarding = null,
        CallRecording|array|null $call_recording = null,
        ?bool $caller_id_name_enabled = null,
        CnamListing|array|null $cnam_listing = null,
        ?string $connection_id = null,
        ?string $connection_name = null,
        ?string $connection_type = null,
        ?string $country_iso_alpha2 = null,
        ?\DateTimeInterface $created_at = null,
        ?string $customer_reference = null,
        Inbound|array|null $inbound = null,
        InboundCallScreening|string|null $inbound_call_screening = null,
        ?bool $mobile_voice_enabled = null,
        NoiseSuppression|string|null $noise_suppression = null,
        Outbound|array|null $outbound = null,
        ?string $phone_number = null,
        ?string $record_type = null,
        ?string $sim_card_id = null,
        ?string $status = null,
        ?array $tags = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $call_forwarding && $obj['call_forwarding'] = $call_forwarding;
        null !== $call_recording && $obj['call_recording'] = $call_recording;
        null !== $caller_id_name_enabled && $obj['caller_id_name_enabled'] = $caller_id_name_enabled;
        null !== $cnam_listing && $obj['cnam_listing'] = $cnam_listing;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $connection_name && $obj['connection_name'] = $connection_name;
        null !== $connection_type && $obj['connection_type'] = $connection_type;
        null !== $country_iso_alpha2 && $obj['country_iso_alpha2'] = $country_iso_alpha2;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $inbound_call_screening && $obj['inbound_call_screening'] = $inbound_call_screening;
        null !== $mobile_voice_enabled && $obj['mobile_voice_enabled'] = $mobile_voice_enabled;
        null !== $noise_suppression && $obj['noise_suppression'] = $noise_suppression;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $sim_card_id && $obj['sim_card_id'] = $sim_card_id;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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

    /**
     * Indicates if caller ID name is enabled.
     */
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

    /**
     * The ID of the connection associated with this number.
     */
    public function withConnectionID(?string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * The name of the connection.
     */
    public function withConnectionName(?string $connectionName): self
    {
        $obj = clone $this;
        $obj['connection_name'] = $connectionName;

        return $obj;
    }

    /**
     * The type of the connection.
     */
    public function withConnectionType(?string $connectionType): self
    {
        $obj = clone $this;
        $obj['connection_type'] = $connectionType;

        return $obj;
    }

    /**
     * The ISO 3166-1 alpha-2 country code of the number.
     */
    public function withCountryISOAlpha2(string $countryISOAlpha2): self
    {
        $obj = clone $this;
        $obj['country_iso_alpha2'] = $countryISOAlpha2;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * @param Inbound|array{
     *   interception_app_id?: string|null, interception_app_name?: string|null
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
        $obj['inbound_call_screening'] = $inboundCallScreening;

        return $obj;
    }

    /**
     * Indicates if mobile voice is enabled.
     */
    public function withMobileVoiceEnabled(bool $mobileVoiceEnabled): self
    {
        $obj = clone $this;
        $obj['mobile_voice_enabled'] = $mobileVoiceEnabled;

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
        $obj['noise_suppression'] = $noiseSuppression;

        return $obj;
    }

    /**
     * @param Outbound|array{
     *   interception_app_id?: string|null, interception_app_name?: string|null
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
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The ID of the SIM card associated with this number.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
