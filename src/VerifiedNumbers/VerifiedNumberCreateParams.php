<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams\VerificationMethod;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VerifiedNumberCreateParams); // set properties as needed
 * $client->verifiedNumbers->create(...$params->toArray());
 * ```
 * Initiates phone number verification procedure.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->verifiedNumbers->create(...$params->toArray());`
 *
 * @see Telnyx\VerifiedNumbers->create
 *
 * @phpstan-type verified_number_create_params = array{
 *   phoneNumber: string,
 *   verificationMethod: VerificationMethod|value-of<VerificationMethod>,
 * }
 */
final class VerifiedNumberCreateParams implements BaseModel
{
    /** @use SdkModel<verified_number_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('phone_number')]
    public string $phoneNumber;

    /**
     * Verification method.
     *
     * @var value-of<VerificationMethod> $verificationMethod
     */
    #[Api('verification_method', enum: VerificationMethod::class)]
    public string $verificationMethod;

    /**
     * `new VerifiedNumberCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifiedNumberCreateParams::with(phoneNumber: ..., verificationMethod: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifiedNumberCreateParams)
     *   ->withPhoneNumber(...)
     *   ->withVerificationMethod(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     */
    public static function with(
        string $phoneNumber,
        VerificationMethod|string $verificationMethod
    ): self {
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;
        $obj->verificationMethod = $verificationMethod instanceof VerificationMethod ? $verificationMethod->value : $verificationMethod;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Verification method.
     *
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
