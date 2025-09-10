<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionSubmitVerificationCodeParams); // set properties as needed
 * $client->verifiedNumbers.actions->submitVerificationCode(...$params->toArray());
 * ```
 * Submit verification code.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->verifiedNumbers.actions->submitVerificationCode(...$params->toArray());`
 *
 * @see Telnyx\VerifiedNumbers\Actions->submitVerificationCode
 *
 * @phpstan-type action_submit_verification_code_params = array{
 *   verificationCode: string
 * }
 */
final class ActionSubmitVerificationCodeParams implements BaseModel
{
    /** @use SdkModel<action_submit_verification_code_params> */
    use SdkModel;
    use SdkParams;

    #[Api('verification_code')]
    public string $verificationCode;

    /**
     * `new ActionSubmitVerificationCodeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSubmitVerificationCodeParams::with(verificationCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSubmitVerificationCodeParams)->withVerificationCode(...)
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
     */
    public static function with(string $verificationCode): self
    {
        $obj = new self;

        $obj->verificationCode = $verificationCode;

        return $obj;
    }

    public function withVerificationCode(string $verificationCode): self
    {
        $obj = clone $this;
        $obj->verificationCode = $verificationCode;

        return $obj;
    }
}
