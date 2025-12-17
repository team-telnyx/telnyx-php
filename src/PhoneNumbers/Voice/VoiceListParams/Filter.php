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
 * @phpstan-import-type ConnectionNameShape from \Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter\ConnectionName
 *
 * @phpstan-type FilterShape = array{
 *   connectionName?: null|ConnectionName|ConnectionNameShape,
 *   customerReference?: string|null,
 *   phoneNumber?: string|null,
 *   voiceUsagePaymentMethod?: null|VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by connection name pattern matching.
     */
    #[Optional('connection_name')]
    public ?ConnectionName $connectionName;

    /**
     * Filter numbers via the customer_reference set.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

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
     * @param ConnectionName|ConnectionNameShape|null $connectionName
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod>|null $voiceUsagePaymentMethod
     */
    public static function with(
        ConnectionName|array|null $connectionName = null,
        ?string $customerReference = null,
        ?string $phoneNumber = null,
        VoiceUsagePaymentMethod|string|null $voiceUsagePaymentMethod = null,
    ): self {
        $self = new self;

        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $voiceUsagePaymentMethod && $self['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $self;
    }

    /**
     * Filter by connection name pattern matching.
     *
     * @param ConnectionName|ConnectionNameShape $connectionName
     */
    public function withConnectionName(
        ConnectionName|array $connectionName
    ): self {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

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
