<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\Status;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\VoiceUsagePaymentMethod;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
 *
 * @phpstan-type FilterShape = array{
 *   billing_group_id?: string|null,
 *   connection_id?: string|null,
 *   customer_reference?: string|null,
 *   emergency_address_id?: string|null,
 *   has_bundle?: string|null,
 *   phone_number?: string|null,
 *   status?: value-of<Status>|null,
 *   tag?: string|null,
 *   voice_connection_name?: VoiceConnectionName|null,
 *   voice_usage_payment_method?: value-of<VoiceUsagePaymentMethod>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    #[Optional]
    public ?string $billing_group_id;

    /**
     * Filter by connection_id.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * Filter numbers via the customer_reference set.
     */
    #[Optional]
    public ?string $customer_reference;

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    #[Optional]
    public ?string $emergency_address_id;

    /**
     * Filter by phone number that have bundles.
     */
    #[Optional]
    public ?string $has_bundle;

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * Filter by phone number status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Filter by phone number tags.
     */
    #[Optional]
    public ?string $tag;

    /**
     * Filter by voice connection name pattern matching.
     */
    #[Optional('voice.connection_name')]
    public ?VoiceConnectionName $voice_connection_name;

    /**
     * Filter by usage_payment_method.
     *
     * @var value-of<VoiceUsagePaymentMethod>|null $voice_usage_payment_method
     */
    #[Optional(
        'voice.usage_payment_method',
        enum: VoiceUsagePaymentMethod::class
    )]
    public ?string $voice_usage_payment_method;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     * @param VoiceConnectionName|array{
     *   contains?: string|null,
     *   ends_with?: string|null,
     *   eq?: string|null,
     *   starts_with?: string|null,
     * } $voice_connection_name
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voice_usage_payment_method
     */
    public static function with(
        ?string $billing_group_id = null,
        ?string $connection_id = null,
        ?string $customer_reference = null,
        ?string $emergency_address_id = null,
        ?string $has_bundle = null,
        ?string $phone_number = null,
        Status|string|null $status = null,
        ?string $tag = null,
        VoiceConnectionName|array|null $voice_connection_name = null,
        VoiceUsagePaymentMethod|string|null $voice_usage_payment_method = null,
    ): self {
        $obj = new self;

        null !== $billing_group_id && $obj['billing_group_id'] = $billing_group_id;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $emergency_address_id && $obj['emergency_address_id'] = $emergency_address_id;
        null !== $has_bundle && $obj['has_bundle'] = $has_bundle;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $status && $obj['status'] = $status;
        null !== $tag && $obj['tag'] = $tag;
        null !== $voice_connection_name && $obj['voice_connection_name'] = $voice_connection_name;
        null !== $voice_usage_payment_method && $obj['voice_usage_payment_method'] = $voice_usage_payment_method;

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
     * Filter by phone number that have bundles.
     */
    public function withHasBundle(string $hasBundle): self
    {
        $obj = clone $this;
        $obj['has_bundle'] = $hasBundle;

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
}
