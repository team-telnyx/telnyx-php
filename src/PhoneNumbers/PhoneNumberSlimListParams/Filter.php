<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberSlimListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\CountryISOAlpha2;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\NumberType;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\NumberType\Eq;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\Source;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\Status;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\VoiceUsagePaymentMethod;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
 *
 * @phpstan-type FilterShape = array{
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   countryISOAlpha2?: string|null|list<string>,
 *   customerReference?: string|null,
 *   emergencyAddressID?: string|null,
 *   numberType?: NumberType|null,
 *   phoneNumber?: string|null,
 *   source?: value-of<Source>|null,
 *   status?: value-of<Status>|null,
 *   tag?: string|null,
 *   voiceConnectionName?: VoiceConnectionName|null,
 *   voiceUsagePaymentMethod?: value-of<VoiceUsagePaymentMethod>|null,
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
     * @param string|list<string> $countryISOAlpha2
     * @param NumberType|array{eq?: value-of<Eq>|null} $numberType
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     * @param VoiceConnectionName|array{
     *   contains?: string|null,
     *   endsWith?: string|null,
     *   eq?: string|null,
     *   startsWith?: string|null,
     * } $voiceConnectionName
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voiceUsagePaymentMethod
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
        $obj = new self;

        null !== $billingGroupID && $obj['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $countryISOAlpha2 && $obj['countryISOAlpha2'] = $countryISOAlpha2;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $emergencyAddressID && $obj['emergencyAddressID'] = $emergencyAddressID;
        null !== $numberType && $obj['numberType'] = $numberType;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $source && $obj['source'] = $source;
        null !== $status && $obj['status'] = $status;
        null !== $tag && $obj['tag'] = $tag;
        null !== $voiceConnectionName && $obj['voiceConnectionName'] = $voiceConnectionName;
        null !== $voiceUsagePaymentMethod && $obj['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $obj;
    }

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billingGroupID'] = $billingGroupID;

        return $obj;
    }

    /**
     * Filter by connection_id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * Filter by phone number country ISO alpha-2 code. Can be a single value or an array of values.
     *
     * @param string|list<string> $countryISOAlpha2
     */
    public function withCountryISOAlpha2(string|array $countryISOAlpha2): self
    {
        $obj = clone $this;
        $obj['countryISOAlpha2'] = $countryISOAlpha2;

        return $obj;
    }

    /**
     * Filter numbers via the customer_reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj['emergencyAddressID'] = $emergencyAddressID;

        return $obj;
    }

    /**
     * Filter phone numbers by phone number type.
     *
     * @param NumberType|array{eq?: value-of<Eq>|null} $numberType
     */
    public function withNumberType(NumberType|array $numberType): self
    {
        $obj = clone $this;
        $obj['numberType'] = $numberType;

        return $obj;
    }

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Filter phone numbers by their source. Use 'ported' for numbers ported from other carriers, or 'purchased' for numbers bought directly from Telnyx.
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }

    /**
     * Filter by phone number status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by phone number tags. (This requires the include_tags param).
     */
    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj['tag'] = $tag;

        return $obj;
    }

    /**
     * Filter by voice connection name pattern matching (requires include_connection param).
     *
     * @param VoiceConnectionName|array{
     *   contains?: string|null,
     *   endsWith?: string|null,
     *   eq?: string|null,
     *   startsWith?: string|null,
     * } $voiceConnectionName
     */
    public function withVoiceConnectionName(
        VoiceConnectionName|array $voiceConnectionName
    ): self {
        $obj = clone $this;
        $obj['voiceConnectionName'] = $voiceConnectionName;

        return $obj;
    }

    /**
     * Filter by usage_payment_method.
     *
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voiceUsagePaymentMethod
     */
    public function withVoiceUsagePaymentMethod(
        VoiceUsagePaymentMethod|string $voiceUsagePaymentMethod
    ): self {
        $obj = clone $this;
        $obj['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $obj;
    }
}
