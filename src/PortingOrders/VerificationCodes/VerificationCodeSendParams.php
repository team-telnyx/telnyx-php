<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VerificationCodeSendParams); // set properties as needed
 * $client->portingOrders.verificationCodes->send(...$params->toArray());
 * ```
 * Send the verification code for all porting phone numbers.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.verificationCodes->send(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\VerificationCodes->send
 *
 * @phpstan-type verification_code_send_params = array{
 *   phoneNumbers?: list<string>,
 *   verificationMethod?: VerificationMethod|value-of<VerificationMethod>,
 * }
 */
final class VerificationCodeSendParams implements BaseModel
{
    /** @use SdkModel<verification_code_send_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $phoneNumbers */
    #[Api('phone_numbers', list: 'string', optional: true)]
    public ?array $phoneNumbers;

    /** @var value-of<VerificationMethod>|null $verificationMethod */
    #[Api('verification_method', enum: VerificationMethod::class, optional: true)]
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
        $obj = new self;

        null !== $phoneNumbers && $obj->phoneNumbers = $phoneNumbers;
        null !== $verificationMethod && $obj->verificationMethod = $verificationMethod instanceof VerificationMethod ? $verificationMethod->value : $verificationMethod;

        return $obj;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     */
    public function withVerificationMethod(
        VerificationMethod|string $verificationMethod
    ): self {
        $obj = clone $this;
        $obj->verificationMethod = $verificationMethod instanceof VerificationMethod ? $verificationMethod->value : $verificationMethod;

        return $obj;
    }
}
