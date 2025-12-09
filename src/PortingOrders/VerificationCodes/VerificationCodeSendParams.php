<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;

/**
 * Send the verification code for all porting phone numbers.
 *
 * @see Telnyx\Services\PortingOrders\VerificationCodesService::send()
 *
 * @phpstan-type VerificationCodeSendParamsShape = array{
 *   phoneNumbers?: list<string>,
 *   verificationMethod?: VerificationMethod|value-of<VerificationMethod>,
 * }
 */
final class VerificationCodeSendParams implements BaseModel
{
    /** @use SdkModel<VerificationCodeSendParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $phoneNumbers */
    #[Optional('phone_numbers', list: 'string')]
    public ?array $phoneNumbers;

    /** @var value-of<VerificationMethod>|null $verificationMethod */
    #[Optional('verification_method', enum: VerificationMethod::class)]
    public ?string $verificationMethod;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phoneNumbers
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     */
    public static function with(
        ?array $phoneNumbers = null,
        VerificationMethod|string|null $verificationMethod = null,
    ): self {
        $self = new self;

        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;
        null !== $verificationMethod && $self['verificationMethod'] = $verificationMethod;

        return $self;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     */
    public function withVerificationMethod(
        VerificationMethod|string $verificationMethod
    ): self {
        $self = clone $this;
        $self['verificationMethod'] = $verificationMethod;

        return $self;
    }
}
