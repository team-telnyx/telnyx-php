<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\CountryISOAlpha2;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\NumberType;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Source;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Status;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\VoiceUsagePaymentMethod;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
 *
 * @phpstan-type filter_alias = array{
 *   billingGroupID?: string,
 *   connectionID?: string,
 *   countryISOAlpha2?: string|list<string>,
 *   customerReference?: string,
 *   emergencyAddressID?: string,
 *   numberType?: NumberType,
 *   phoneNumber?: string,
 *   source?: value-of<Source>,
 *   status?: value-of<Status>,
 *   tag?: string,
 *   voiceConnectionName?: VoiceConnectionName,
 *   voiceUsagePaymentMethod?: value-of<VoiceUsagePaymentMethod>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    #[Api('billing_group_id', optional: true)]
    public ?string $billingGroupID;

    /**
     * Filter by connection_id.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * Filter by phone number country ISO alpha-2 code. Can be a single value or an array of values.
     *
     * @var string|list<string>|null $countryISOAlpha2
     */
    #[Api('country_iso_alpha2', union: CountryISOAlpha2::class, optional: true)]
    public string|array|null $countryISOAlpha2;

    /**
     * Filter numbers via the customer_reference set.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    #[Api('emergency_address_id', optional: true)]
    public ?string $emergencyAddressID;

    /**
     * Filter phone numbers by phone number type.
     */
    #[Api('number_type', optional: true)]
    public ?NumberType $numberType;

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Filter phone numbers by their source. Use 'ported' for numbers ported from other carriers, or 'purchased' for numbers bought directly from Telnyx.
     *
     * @var value-of<Source>|null $source
     */
    #[Api(enum: Source::class, optional: true)]
    public ?string $source;

    /**
     * Filter by phone number status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Filter by phone number tags.
     */
    #[Api(optional: true)]
    public ?string $tag;

    /**
     * Filter by voice connection name pattern matching.
     */
    #[Api('voice.connection_name', optional: true)]
    public ?VoiceConnectionName $voiceConnectionName;

    /**
     * Filter by usage_payment_method.
     *
     * @var value-of<VoiceUsagePaymentMethod>|null $voiceUsagePaymentMethod
     */
    #[Api(
        'voice.usage_payment_method',
        enum: VoiceUsagePaymentMethod::class,
        optional: true,
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
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voiceUsagePaymentMethod
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        string|array|null $countryISOAlpha2 = null,
        ?string $customerReference = null,
        ?string $emergencyAddressID = null,
        ?NumberType $numberType = null,
        ?string $phoneNumber = null,
        Source|string|null $source = null,
        Status|string|null $status = null,
        ?string $tag = null,
        ?VoiceConnectionName $voiceConnectionName = null,
        VoiceUsagePaymentMethod|string|null $voiceUsagePaymentMethod = null,
    ): self {
        $obj = new self;

        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $countryISOAlpha2 && $obj->countryISOAlpha2 = $countryISOAlpha2;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $emergencyAddressID && $obj->emergencyAddressID = $emergencyAddressID;
        null !== $numberType && $obj->numberType = $numberType;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $source && $obj->source = $source instanceof Source ? $source->value : $source;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $tag && $obj->tag = $tag;
        null !== $voiceConnectionName && $obj->voiceConnectionName = $voiceConnectionName;
        null !== $voiceUsagePaymentMethod && $obj->voiceUsagePaymentMethod = $voiceUsagePaymentMethod instanceof VoiceUsagePaymentMethod ? $voiceUsagePaymentMethod->value : $voiceUsagePaymentMethod;

        return $obj;
    }

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billingGroupID = $billingGroupID;

        return $obj;
    }

    /**
     * Filter by connection_id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

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
        $obj->countryISOAlpha2 = $countryISOAlpha2;

        return $obj;
    }

    /**
     * Filter numbers via the customer_reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj->emergencyAddressID = $emergencyAddressID;

        return $obj;
    }

    /**
     * Filter phone numbers by phone number type.
     */
    public function withNumberType(NumberType $numberType): self
    {
        $obj = clone $this;
        $obj->numberType = $numberType;

        return $obj;
    }

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

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
        $obj->source = $source instanceof Source ? $source->value : $source;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Filter by phone number tags.
     */
    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj->tag = $tag;

        return $obj;
    }

    /**
     * Filter by voice connection name pattern matching.
     */
    public function withVoiceConnectionName(
        VoiceConnectionName $voiceConnectionName
    ): self {
        $obj = clone $this;
        $obj->voiceConnectionName = $voiceConnectionName;

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
        $obj->voiceUsagePaymentMethod = $voiceUsagePaymentMethod instanceof VoiceUsagePaymentMethod ? $voiceUsagePaymentMethod->value : $voiceUsagePaymentMethod;

        return $obj;
    }
}
