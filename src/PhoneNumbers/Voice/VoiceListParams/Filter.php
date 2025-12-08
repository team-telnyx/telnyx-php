<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice\VoiceListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter\ConnectionName;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter\VoiceUsagePaymentMethod;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method].
 *
 * @phpstan-type FilterShape = array{
 *   connection_name?: ConnectionName|null,
 *   customer_reference?: string|null,
 *   phone_number?: string|null,
 *   voice_usage_payment_method?: value-of<VoiceUsagePaymentMethod>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by connection name pattern matching.
     */
    #[Optional]
    public ?ConnectionName $connection_name;

    /**
     * Filter numbers via the customer_reference set.
     */
    #[Optional]
    public ?string $customer_reference;

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    #[Optional]
    public ?string $phone_number;

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
     * @param ConnectionName|array{contains?: string|null} $connection_name
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voice_usage_payment_method
     */
    public static function with(
        ConnectionName|array|null $connection_name = null,
        ?string $customer_reference = null,
        ?string $phone_number = null,
        VoiceUsagePaymentMethod|string|null $voice_usage_payment_method = null,
    ): self {
        $obj = new self;

        null !== $connection_name && $obj['connection_name'] = $connection_name;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $voice_usage_payment_method && $obj['voice_usage_payment_method'] = $voice_usage_payment_method;

        return $obj;
    }

    /**
     * Filter by connection name pattern matching.
     *
     * @param ConnectionName|array{contains?: string|null} $connectionName
     */
    public function withConnectionName(
        ConnectionName|array $connectionName
    ): self {
        $obj = clone $this;
        $obj['connection_name'] = $connectionName;

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
