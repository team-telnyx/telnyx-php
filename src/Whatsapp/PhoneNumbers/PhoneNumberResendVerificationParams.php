<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberResendVerificationParams\VerificationMethod;

/**
 * Resend verification code.
 *
 * @see Telnyx\Services\Whatsapp\PhoneNumbersService::resendVerification()
 *
 * @phpstan-type PhoneNumberResendVerificationParamsShape = array{
 *   verificationMethod?: null|VerificationMethod|value-of<VerificationMethod>
 * }
 */
final class PhoneNumberResendVerificationParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberResendVerificationParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * @param VerificationMethod|value-of<VerificationMethod>|null $verificationMethod
     */
    public static function with(
        VerificationMethod|string|null $verificationMethod = null
    ): self {
        $self = new self;

        null !== $verificationMethod && $self['verificationMethod'] = $verificationMethod;

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
