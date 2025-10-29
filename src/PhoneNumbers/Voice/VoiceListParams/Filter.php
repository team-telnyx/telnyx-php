<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice\VoiceListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter\ConnectionName;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter\VoiceUsagePaymentMethod;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method].
 *
 * @phpstan-type FilterShape = array{
 *   connectionName?: ConnectionName,
 *   customerReference?: string,
 *   phoneNumber?: string,
 *   voiceUsagePaymentMethod?: value-of<VoiceUsagePaymentMethod>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by connection name pattern matching.
     */
    #[Api('connection_name', optional: true)]
    public ?ConnectionName $connectionName;

    /**
     * Filter numbers via the customer_reference set.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

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
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voiceUsagePaymentMethod
     */
    public static function with(
        ?ConnectionName $connectionName = null,
        ?string $customerReference = null,
        ?string $phoneNumber = null,
        VoiceUsagePaymentMethod|string|null $voiceUsagePaymentMethod = null,
    ): self {
        $obj = new self;

        null !== $connectionName && $obj->connectionName = $connectionName;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $voiceUsagePaymentMethod && $obj['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $obj;
    }

    /**
     * Filter by connection name pattern matching.
     */
    public function withConnectionName(ConnectionName $connectionName): self
    {
        $obj = clone $this;
        $obj->connectionName = $connectionName;

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
