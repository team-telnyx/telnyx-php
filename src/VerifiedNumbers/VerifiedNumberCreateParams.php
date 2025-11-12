<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams\VerificationMethod;

/**
 * Initiates phone number verification procedure. Supports DTMF extension dialing for voice calls to numbers behind IVR systems.
 *
 * @see Telnyx\Services\VerifiedNumbersService::create()
 *
 * @phpstan-type VerifiedNumberCreateParamsShape = array{
 *   phone_number: string,
 *   verification_method: VerificationMethod|value-of<VerificationMethod>,
 *   extension?: string|null,
 * }
 */
final class VerifiedNumberCreateParams implements BaseModel
{
    /** @use SdkModel<VerifiedNumberCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $phone_number;

    /**
     * Verification method.
     *
     * @var value-of<VerificationMethod> $verification_method
     */
    #[Api(enum: VerificationMethod::class)]
    public string $verification_method;

    /**
     * Optional DTMF extension sequence to dial after the call is answered. This parameter enables verification of phone numbers behind IVR systems that require extension dialing. Valid characters: digits 0-9, letters A-D, symbols * and #. Pauses: w = 0.5 second pause, W = 1 second pause. Maximum length: 50 characters. Only works with 'call' verification method.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $extension;

    /**
     * `new VerifiedNumberCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifiedNumberCreateParams::with(phone_number: ..., verification_method: ...)
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
     * @param VerificationMethod|value-of<VerificationMethod> $verification_method
     */
    public static function with(
        string $phone_number,
        VerificationMethod|string $verification_method,
        ?string $extension = null,
    ): self {
        $obj = new self;

        $obj->phone_number = $phone_number;
        $obj['verification_method'] = $verification_method;

        null !== $extension && $obj->extension = $extension;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

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
        $obj['verification_method'] = $verificationMethod;

        return $obj;
    }

    /**
     * Optional DTMF extension sequence to dial after the call is answered. This parameter enables verification of phone numbers behind IVR systems that require extension dialing. Valid characters: digits 0-9, letters A-D, symbols * and #. Pauses: w = 0.5 second pause, W = 1 second pause. Maximum length: 50 characters. Only works with 'call' verification method.
     */
    public function withExtension(?string $extension): self
    {
        $obj = clone $this;
        $obj->extension = $extension;

        return $obj;
    }
}
