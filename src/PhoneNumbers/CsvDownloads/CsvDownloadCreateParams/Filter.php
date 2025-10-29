<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\Status;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\VoiceUsagePaymentMethod;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
 *
 * @phpstan-type FilterShape = array{
 *   billingGroupID?: string,
 *   connectionID?: string,
 *   customerReference?: string,
 *   emergencyAddressID?: string,
 *   hasBundle?: string,
 *   phoneNumber?: string,
 *   status?: value-of<Status>,
 *   tag?: string,
 *   voiceConnectionName?: VoiceConnectionName,
 *   voiceUsagePaymentMethod?: value-of<VoiceUsagePaymentMethod>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
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
     * Filter by phone number that have bundles.
     */
    #[Api('has_bundle', optional: true)]
    public ?string $hasBundle;

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

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
     * @param Status|value-of<Status> $status
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voiceUsagePaymentMethod
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $emergencyAddressID = null,
        ?string $hasBundle = null,
        ?string $phoneNumber = null,
        Status|string|null $status = null,
        ?string $tag = null,
        ?VoiceConnectionName $voiceConnectionName = null,
        VoiceUsagePaymentMethod|string|null $voiceUsagePaymentMethod = null,
    ): self {
        $obj = new self;

        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $emergencyAddressID && $obj->emergencyAddressID = $emergencyAddressID;
        null !== $hasBundle && $obj->hasBundle = $hasBundle;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $status && $obj['status'] = $status;
        null !== $tag && $obj->tag = $tag;
        null !== $voiceConnectionName && $obj->voiceConnectionName = $voiceConnectionName;
        null !== $voiceUsagePaymentMethod && $obj['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

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
     * Filter by phone number that have bundles.
     */
    public function withHasBundle(string $hasBundle): self
    {
        $obj = clone $this;
        $obj->hasBundle = $hasBundle;

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
        $obj['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $obj;
    }
}
