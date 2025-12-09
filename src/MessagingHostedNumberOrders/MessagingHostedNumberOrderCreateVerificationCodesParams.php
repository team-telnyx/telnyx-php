<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams\VerificationMethod;

/**
 * Create verification codes to validate numbers of the hosted order. The verification codes will be sent to the numbers of the hosted order.
 *
 * @see Telnyx\Services\MessagingHostedNumberOrdersService::createVerificationCodes()
 *
 * @phpstan-type MessagingHostedNumberOrderCreateVerificationCodesParamsShape = array{
 *   phoneNumbers: list<string>,
 *   verificationMethod: VerificationMethod|value-of<VerificationMethod>,
 * }
 */
final class MessagingHostedNumberOrderCreateVerificationCodesParams implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderCreateVerificationCodesParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $phoneNumbers */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /** @var value-of<VerificationMethod> $verificationMethod */
    #[Required('verification_method', enum: VerificationMethod::class)]
    public string $verificationMethod;

    /**
     * `new MessagingHostedNumberOrderCreateVerificationCodesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingHostedNumberOrderCreateVerificationCodesParams::with(
     *   phoneNumbers: ..., verificationMethod: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingHostedNumberOrderCreateVerificationCodesParams)
     *   ->withPhoneNumbers(...)
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
     * @param list<string> $phoneNumbers
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     */
    public static function with(
        array $phoneNumbers,
        VerificationMethod|string $verificationMethod
    ): self {
        $self = new self;

        $self['phoneNumbers'] = $phoneNumbers;
        $self['verificationMethod'] = $verificationMethod;

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
