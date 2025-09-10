<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VerificationCodeVerifyParams); // set properties as needed
 * $client->portingOrders.verificationCodes->verify(...$params->toArray());
 * ```
 * Verifies the verification code for a list of phone numbers.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.verificationCodes->verify(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\VerificationCodes->verify
 *
 * @phpstan-type verification_code_verify_params = array{
 *   verificationCodes?: list<VerificationCode>
 * }
 */
final class VerificationCodeVerifyParams implements BaseModel
{
    /** @use SdkModel<verification_code_verify_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<VerificationCode>|null $verificationCodes */
    #[Api('verification_codes', list: VerificationCode::class, optional: true)]
    public ?array $verificationCodes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<VerificationCode> $verificationCodes
     */
    public static function with(?array $verificationCodes = null): self
    {
        $obj = new self;

        null !== $verificationCodes && $obj->verificationCodes = $verificationCodes;

        return $obj;
    }

    /**
     * @param list<VerificationCode> $verificationCodes
     */
    public function withVerificationCodes(array $verificationCodes): self
    {
        $obj = clone $this;
        $obj->verificationCodes = $verificationCodes;

        return $obj;
    }
}
