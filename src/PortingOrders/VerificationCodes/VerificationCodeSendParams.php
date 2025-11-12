<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;

/**
 * Send the verification code for all porting phone numbers.
 *
 * @see Telnyx\STAINLESS_FIXME_PortingOrders\VerificationCodesService::send()
 *
 * @phpstan-type VerificationCodeSendParamsShape = array{
 *   phone_numbers?: list<string>,
 *   verification_method?: VerificationMethod|value-of<VerificationMethod>,
 * }
 */
final class VerificationCodeSendParams implements BaseModel
{
    /** @use SdkModel<VerificationCodeSendParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $phone_numbers */
    #[Api(list: 'string', optional: true)]
    public ?array $phone_numbers;

    /** @var value-of<VerificationMethod>|null $verification_method */
    #[Api(enum: VerificationMethod::class, optional: true)]
    public ?string $verification_method;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phone_numbers
     * @param VerificationMethod|value-of<VerificationMethod> $verification_method
     */
    public static function with(
        ?array $phone_numbers = null,
        VerificationMethod|string|null $verification_method = null,
    ): self {
        $obj = new self;

        null !== $phone_numbers && $obj->phone_numbers = $phone_numbers;
        null !== $verification_method && $obj['verification_method'] = $verification_method;

        return $obj;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }

    /**
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     */
    public function withVerificationMethod(
        VerificationMethod|string $verificationMethod
    ): self {
        $obj = clone $this;
        $obj['verification_method'] = $verificationMethod;

        return $obj;
    }
}
