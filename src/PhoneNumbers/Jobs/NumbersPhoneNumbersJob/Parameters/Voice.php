<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice\CallRecording;
use Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice\CnamListing;
use Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice\MediaFeatures;

/**
 * Saved voice settings for an update_phone_numbers job, using the public field names and nesting. Only settings present at creation are returned.
 *
 * @phpstan-import-type CallForwardingShape from \Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice\CallForwarding
 * @phpstan-import-type CallRecordingShape from \Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice\CallRecording
 * @phpstan-import-type CnamListingShape from \Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice\CnamListing
 * @phpstan-import-type MediaFeaturesShape from \Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice\MediaFeatures
 *
 * @phpstan-type VoiceShape = array{
 *   callForwarding?: null|CallForwarding|CallForwardingShape,
 *   callRecording?: null|CallRecording|CallRecordingShape,
 *   callerIDNameEnabled?: bool|null,
 *   cnamListing?: null|CnamListing|CnamListingShape,
 *   inboundCallScreening?: string|null,
 *   mediaFeatures?: null|MediaFeatures|MediaFeaturesShape,
 *   techPrefixEnabled?: bool|null,
 *   usagePaymentMethod?: string|null,
 * }
 */
final class Voice implements BaseModel
{
    /** @use SdkModel<VoiceShape> */
    use SdkModel;

    #[Optional('call_forwarding')]
    public ?CallForwarding $callForwarding;

    #[Optional('call_recording')]
    public ?CallRecording $callRecording;

    /**
     * Saved caller_id_name_enabled setting.
     */
    #[Optional('caller_id_name_enabled', nullable: true)]
    public ?bool $callerIDNameEnabled;

    #[Optional('cnam_listing')]
    public ?CnamListing $cnamListing;

    /**
     * Saved inbound_call_screening setting.
     */
    #[Optional('inbound_call_screening', nullable: true)]
    public ?string $inboundCallScreening;

    #[Optional('media_features')]
    public ?MediaFeatures $mediaFeatures;

    /**
     * Saved tech_prefix_enabled setting.
     */
    #[Optional('tech_prefix_enabled', nullable: true)]
    public ?bool $techPrefixEnabled;

    /**
     * Saved usage_payment_method setting.
     */
    #[Optional('usage_payment_method', nullable: true)]
    public ?string $usagePaymentMethod;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallForwarding|CallForwardingShape|null $callForwarding
     * @param CallRecording|CallRecordingShape|null $callRecording
     * @param CnamListing|CnamListingShape|null $cnamListing
     * @param MediaFeatures|MediaFeaturesShape|null $mediaFeatures
     */
    public static function with(
        bool|Omitted|null $callerIDNameEnabled = Omitted::VALUE,
        string|Omitted|null $inboundCallScreening = Omitted::VALUE,
        bool|Omitted|null $techPrefixEnabled = Omitted::VALUE,
        string|Omitted|null $usagePaymentMethod = Omitted::VALUE,
        CallForwarding|array|null $callForwarding = null,
        CallRecording|array|null $callRecording = null,
        CnamListing|array|null $cnamListing = null,
        MediaFeatures|array|null $mediaFeatures = null,
    ): self {
        $self = new self;

        null !== $callForwarding && $self['callForwarding'] = $callForwarding;
        null !== $callRecording && $self['callRecording'] = $callRecording;
        Omitted::VALUE !== $callerIDNameEnabled && $self['callerIDNameEnabled'] = $callerIDNameEnabled;
        null !== $cnamListing && $self['cnamListing'] = $cnamListing;
        Omitted::VALUE !== $inboundCallScreening && $self['inboundCallScreening'] = $inboundCallScreening;
        null !== $mediaFeatures && $self['mediaFeatures'] = $mediaFeatures;
        Omitted::VALUE !== $techPrefixEnabled && $self['techPrefixEnabled'] = $techPrefixEnabled;
        Omitted::VALUE !== $usagePaymentMethod && $self['usagePaymentMethod'] = $usagePaymentMethod;

        return $self;
    }

    /**
     * @param CallForwarding|CallForwardingShape $callForwarding
     */
    public function withCallForwarding(
        CallForwarding|array $callForwarding
    ): self {
        $self = clone $this;
        $self['callForwarding'] = $callForwarding;

        return $self;
    }

    /**
     * @param CallRecording|CallRecordingShape $callRecording
     */
    public function withCallRecording(CallRecording|array $callRecording): self
    {
        $self = clone $this;
        $self['callRecording'] = $callRecording;

        return $self;
    }

    /**
     * Saved caller_id_name_enabled setting.
     */
    public function withCallerIDNameEnabled(?bool $callerIDNameEnabled): self
    {
        $self = clone $this;
        $self['callerIDNameEnabled'] = $callerIDNameEnabled;

        return $self;
    }

    /**
     * @param CnamListing|CnamListingShape $cnamListing
     */
    public function withCnamListing(CnamListing|array $cnamListing): self
    {
        $self = clone $this;
        $self['cnamListing'] = $cnamListing;

        return $self;
    }

    /**
     * Saved inbound_call_screening setting.
     */
    public function withInboundCallScreening(
        ?string $inboundCallScreening
    ): self {
        $self = clone $this;
        $self['inboundCallScreening'] = $inboundCallScreening;

        return $self;
    }

    /**
     * @param MediaFeatures|MediaFeaturesShape $mediaFeatures
     */
    public function withMediaFeatures(MediaFeatures|array $mediaFeatures): self
    {
        $self = clone $this;
        $self['mediaFeatures'] = $mediaFeatures;

        return $self;
    }

    /**
     * Saved tech_prefix_enabled setting.
     */
    public function withTechPrefixEnabled(?bool $techPrefixEnabled): self
    {
        $self = clone $this;
        $self['techPrefixEnabled'] = $techPrefixEnabled;

        return $self;
    }

    /**
     * Saved usage_payment_method setting.
     */
    public function withUsagePaymentMethod(?string $usagePaymentMethod): self
    {
        $self = clone $this;
        $self['usagePaymentMethod'] = $usagePaymentMethod;

        return $self;
    }
}
