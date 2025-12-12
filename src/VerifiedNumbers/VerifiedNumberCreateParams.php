<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 *   phoneNumber: string,
 *   verificationMethod: VerificationMethod|value-of<VerificationMethod>,
 *   extension?: string,
 * }
 */
final class VerifiedNumberCreateParams implements BaseModel
{
    /** @use SdkModel<VerifiedNumberCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * Verification method.
     *
     * @var value-of<VerificationMethod> $verificationMethod
     */
    #[Required('verification_method', enum: VerificationMethod::class)]
    public string $verificationMethod;

    /**
     * Optional DTMF extension sequence to dial after the call is answered. This parameter enables verification of phone numbers behind IVR systems that require extension dialing. Valid characters: digits 0-9, letters A-D, symbols * and #. Pauses: w = 0.5 second pause, W = 1 second pause. Maximum length: 50 characters. Only works with 'call' verification method.
     */
    #[Optional]
    public ?string $extension;

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
        VerificationMethod|string $verificationMethod,
        ?string $extension = null,
    ): self {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;
        $self['verificationMethod'] = $verificationMethod;

        null !== $extension && $self['extension'] = $extension;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Verification method.
     *
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     */
    public function withVerificationMethod(
        VerificationMethod|string $verificationMethod
    ): self {
        $self = clone $this;
        $self['verificationMethod'] = $verificationMethod;

        return $self;
    }

    /**
     * Optional DTMF extension sequence to dial after the call is answered. This parameter enables verification of phone numbers behind IVR systems that require extension dialing. Valid characters: digits 0-9, letters A-D, symbols * and #. Pauses: w = 0.5 second pause, W = 1 second pause. Maximum length: 50 characters. Only works with 'call' verification method.
     */
    public function withExtension(string $extension): self
    {
        $self = clone $this;
        $self['extension'] = $extension;

        return $self;
    }
}
