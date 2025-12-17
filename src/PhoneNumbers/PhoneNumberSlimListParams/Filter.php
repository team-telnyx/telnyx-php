<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberSlimListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\CountryISOAlpha2;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\NumberType;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\Source;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\Status;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\VoiceUsagePaymentMethod;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
 *
 * @phpstan-import-type CountryISOAlpha2Shape from \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\CountryISOAlpha2
 * @phpstan-import-type NumberTypeShape from \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\NumberType
 * @phpstan-import-type VoiceConnectionNameShape from \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\VoiceConnectionName
 *
 * @phpstan-type FilterShape = array{
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   countryISOAlpha2?: CountryISOAlpha2Shape|null,
 *   customerReference?: string|null,
 *   emergencyAddressID?: string|null,
 *   numberType?: null|NumberType|NumberTypeShape,
 *   phoneNumber?: string|null,
 *   source?: null|Source|value-of<Source>,
 *   status?: null|Status|value-of<Status>,
 *   tag?: string|null,
 *   voiceConnectionName?: null|VoiceConnectionName|VoiceConnectionNameShape,
 *   voiceUsagePaymentMethod?: null|VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Filter by connection_id.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Filter by phone number country ISO alpha-2 code. Can be a single value or an array of values.
     *
     * @var string|list<string>|null $countryISOAlpha2
     */
    #[Optional('country_iso_alpha2', union: CountryISOAlpha2::class)]
    public string|array|null $countryISOAlpha2;

    /**
     * Filter numbers via the customer_reference set.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    #[Optional('emergency_address_id')]
    public ?string $emergencyAddressID;

    /**
     * Filter phone numbers by phone number type.
     */
    #[Optional('number_type')]
    public ?NumberType $numberType;

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Filter phone numbers by their source. Use 'ported' for numbers ported from other carriers, or 'purchased' for numbers bought directly from Telnyx.
     *
     * @var value-of<Source>|null $source
     */
    #[Optional(enum: Source::class)]
    public ?string $source;

    /**
     * Filter by phone number status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Filter by phone number tags. (This requires the include_tags param).
     */
    #[Optional]
    public ?string $tag;

    /**
     * Filter by voice connection name pattern matching (requires include_connection param).
     */
    #[Optional('voice.connection_name')]
    public ?VoiceConnectionName $voiceConnectionName;

    /**
     * Filter by usage_payment_method.
     *
     * @var value-of<VoiceUsagePaymentMethod>|null $voiceUsagePaymentMethod
     */
    #[Optional(
        'voice.usage_payment_method',
        enum: VoiceUsagePaymentMethod::class
    )]
    public ?string $voiceUsagePaymentMethod;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CountryISOAlpha2Shape|null $countryISOAlpha2
     * @param NumberType|NumberTypeShape|null $numberType
     * @param Source|value-of<Source>|null $source
     * @param Status|value-of<Status>|null $status
     * @param VoiceConnectionName|VoiceConnectionNameShape|null $voiceConnectionName
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod>|null $voiceUsagePaymentMethod
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        string|array|null $countryISOAlpha2 = null,
        ?string $customerReference = null,
        ?string $emergencyAddressID = null,
        NumberType|array|null $numberType = null,
        ?string $phoneNumber = null,
        Source|string|null $source = null,
        Status|string|null $status = null,
        ?string $tag = null,
        VoiceConnectionName|array|null $voiceConnectionName = null,
        VoiceUsagePaymentMethod|string|null $voiceUsagePaymentMethod = null,
    ): self {
        $self = new self;

        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $countryISOAlpha2 && $self['countryISOAlpha2'] = $countryISOAlpha2;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $emergencyAddressID && $self['emergencyAddressID'] = $emergencyAddressID;
        null !== $numberType && $self['numberType'] = $numberType;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $source && $self['source'] = $source;
        null !== $status && $self['status'] = $status;
        null !== $tag && $self['tag'] = $tag;
        null !== $voiceConnectionName && $self['voiceConnectionName'] = $voiceConnectionName;
        null !== $voiceUsagePaymentMethod && $self['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $self;
    }

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Filter by connection_id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Filter by phone number country ISO alpha-2 code. Can be a single value or an array of values.
     *
     * @param CountryISOAlpha2Shape $countryISOAlpha2
     */
    public function withCountryISOAlpha2(string|array $countryISOAlpha2): self
    {
        $self = clone $this;
        $self['countryISOAlpha2'] = $countryISOAlpha2;

        return $self;
    }

    /**
     * Filter numbers via the customer_reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $self = clone $this;
        $self['emergencyAddressID'] = $emergencyAddressID;

        return $self;
    }

    /**
     * Filter phone numbers by phone number type.
     *
     * @param NumberType|NumberTypeShape $numberType
     */
    public function withNumberType(NumberType|array $numberType): self
    {
        $self = clone $this;
        $self['numberType'] = $numberType;

        return $self;
    }

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Filter phone numbers by their source. Use 'ported' for numbers ported from other carriers, or 'purchased' for numbers bought directly from Telnyx.
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * Filter by phone number status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Filter by phone number tags. (This requires the include_tags param).
     */
    public function withTag(string $tag): self
    {
        $self = clone $this;
        $self['tag'] = $tag;

        return $self;
    }

    /**
     * Filter by voice connection name pattern matching (requires include_connection param).
     *
     * @param VoiceConnectionName|VoiceConnectionNameShape $voiceConnectionName
     */
    public function withVoiceConnectionName(
        VoiceConnectionName|array $voiceConnectionName
    ): self {
        $self = clone $this;
        $self['voiceConnectionName'] = $voiceConnectionName;

        return $self;
    }

    /**
     * Filter by usage_payment_method.
     *
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voiceUsagePaymentMethod
     */
    public function withVoiceUsagePaymentMethod(
        VoiceUsagePaymentMethod|string $voiceUsagePaymentMethod
    ): self {
        $self = clone $this;
        $self['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $self;
    }
}
