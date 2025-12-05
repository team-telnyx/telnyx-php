<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\CountryISOAlpha2;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\NumberType;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\NumberType\Eq;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Source;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Status;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\WithoutTags;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
 *
 * @phpstan-type FilterShape = array{
 *   billing_group_id?: string|null,
 *   connection_id?: string|null,
 *   country_iso_alpha2?: string|null|list<string>,
 *   customer_reference?: string|null,
 *   emergency_address_id?: string|null,
 *   number_type?: NumberType|null,
 *   phone_number?: string|null,
 *   source?: value-of<Source>|null,
 *   status?: value-of<Status>|null,
 *   tag?: string|null,
 *   voice_connection_name?: VoiceConnectionName|null,
 *   voice_usage_payment_method?: value-of<VoiceUsagePaymentMethod>|null,
 *   without_tags?: value-of<WithoutTags>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    #[Api(optional: true)]
    public ?string $billing_group_id;

    /**
     * Filter by connection_id.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * Filter by phone number country ISO alpha-2 code. Can be a single value or an array of values.
     *
     * @var string|list<string>|null $country_iso_alpha2
     */
    #[Api(union: CountryISOAlpha2::class, optional: true)]
    public string|array|null $country_iso_alpha2;

    /**
     * Filter numbers via the customer_reference set.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    #[Api(optional: true)]
    public ?string $emergency_address_id;

    /**
     * Filter phone numbers by phone number type.
     */
    #[Api(optional: true)]
    public ?NumberType $number_type;

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

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
    public ?VoiceConnectionName $voice_connection_name;

    /**
     * Filter by usage_payment_method.
     *
     * @var value-of<VoiceUsagePaymentMethod>|null $voice_usage_payment_method
     */
    #[Api(
        'voice.usage_payment_method',
        enum: VoiceUsagePaymentMethod::class,
        optional: true,
    )]
    public ?string $voice_usage_payment_method;

    /**
     * When set to 'true', filters for phone numbers that do not have any tags applied. All other values are ignored.
     *
     * @var value-of<WithoutTags>|null $without_tags
     */
    #[Api(enum: WithoutTags::class, optional: true)]
    public ?string $without_tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|list<string> $country_iso_alpha2
     * @param NumberType|array{eq?: value-of<Eq>|null} $number_type
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     * @param VoiceConnectionName|array{
     *   contains?: string|null,
     *   ends_with?: string|null,
     *   eq?: string|null,
     *   starts_with?: string|null,
     * } $voice_connection_name
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voice_usage_payment_method
     * @param WithoutTags|value-of<WithoutTags> $without_tags
     */
    public static function with(
        ?string $billing_group_id = null,
        ?string $connection_id = null,
        string|array|null $country_iso_alpha2 = null,
        ?string $customer_reference = null,
        ?string $emergency_address_id = null,
        NumberType|array|null $number_type = null,
        ?string $phone_number = null,
        Source|string|null $source = null,
        Status|string|null $status = null,
        ?string $tag = null,
        VoiceConnectionName|array|null $voice_connection_name = null,
        VoiceUsagePaymentMethod|string|null $voice_usage_payment_method = null,
        WithoutTags|string|null $without_tags = null,
    ): self {
        $obj = new self;

        null !== $billing_group_id && $obj['billing_group_id'] = $billing_group_id;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $country_iso_alpha2 && $obj['country_iso_alpha2'] = $country_iso_alpha2;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $emergency_address_id && $obj['emergency_address_id'] = $emergency_address_id;
        null !== $number_type && $obj['number_type'] = $number_type;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $source && $obj['source'] = $source;
        null !== $status && $obj['status'] = $status;
        null !== $tag && $obj['tag'] = $tag;
        null !== $voice_connection_name && $obj['voice_connection_name'] = $voice_connection_name;
        null !== $voice_usage_payment_method && $obj['voice_usage_payment_method'] = $voice_usage_payment_method;
        null !== $without_tags && $obj['without_tags'] = $without_tags;

        return $obj;
    }

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billing_group_id'] = $billingGroupID;

        return $obj;
    }

    /**
     * Filter by connection_id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

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
        $obj['country_iso_alpha2'] = $countryISOAlpha2;

        return $obj;
    }

    /**
     * Filter numbers via the customer_reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj['emergency_address_id'] = $emergencyAddressID;

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
        $obj['number_type'] = $numberType;

        return $obj;
    }

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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
     * Filter by phone number tags.
     */
    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj['tag'] = $tag;

        return $obj;
    }

    /**
     * Filter by voice connection name pattern matching.
     *
     * @param VoiceConnectionName|array{
     *   contains?: string|null,
     *   ends_with?: string|null,
     *   eq?: string|null,
     *   starts_with?: string|null,
     * } $voiceConnectionName
     */
    public function withVoiceConnectionName(
        VoiceConnectionName|array $voiceConnectionName
    ): self {
        $obj = clone $this;
        $obj['voice_connection_name'] = $voiceConnectionName;

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
        $obj['voice_usage_payment_method'] = $voiceUsagePaymentMethod;

        return $obj;
    }

    /**
     * When set to 'true', filters for phone numbers that do not have any tags applied. All other values are ignored.
     *
     * @param WithoutTags|value-of<WithoutTags> $withoutTags
     */
    public function withWithoutTags(WithoutTags|string $withoutTags): self
    {
        $obj = clone $this;
        $obj['without_tags'] = $withoutTags;

        return $obj;
    }
}
