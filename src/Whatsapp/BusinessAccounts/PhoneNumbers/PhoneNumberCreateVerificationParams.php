<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberCreateVerificationParams\VerificationMethod;

/**
 * Initialize Whatsapp phone number verification.
 *
 * @see Telnyx\Services\Whatsapp\BusinessAccounts\PhoneNumbersService::createVerification()
 *
 * @phpstan-type PhoneNumberCreateVerificationParamsShape = array{
 *   displayName: string,
 *   phoneNumber: string,
 *   language?: string|null,
 *   verificationMethod?: null|VerificationMethod|value-of<VerificationMethod>,
 * }
 */
final class PhoneNumberCreateVerificationParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberCreateVerificationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('display_name')]
    public string $displayName;

    #[Required('phone_number')]
    public string $phoneNumber;

    #[Optional]
    public ?string $language;

    /** @var value-of<VerificationMethod>|null $verificationMethod */
    #[Optional('verification_method', enum: VerificationMethod::class)]
    public ?string $verificationMethod;

    /**
     * `new PhoneNumberCreateVerificationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberCreateVerificationParams::with(displayName: ..., phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberCreateVerificationParams)
     *   ->withDisplayName(...)
     *   ->withPhoneNumber(...)
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
     * @param VerificationMethod|value-of<VerificationMethod>|null $verificationMethod
     */
    public static function with(
        string $displayName,
        string $phoneNumber,
        ?string $language = null,
        VerificationMethod|string|null $verificationMethod = null,
    ): self {
        $self = new self;

        $self['displayName'] = $displayName;
        $self['phoneNumber'] = $phoneNumber;

        null !== $language && $self['language'] = $language;
        null !== $verificationMethod && $self['verificationMethod'] = $verificationMethod;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

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
