<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Api;
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
 *   phone_numbers: list<string>,
 *   verification_method: VerificationMethod|value-of<VerificationMethod>,
 * }
 */
final class MessagingHostedNumberOrderCreateVerificationCodesParams implements BaseModel
{
    /**
     * @use SdkModel<MessagingHostedNumberOrderCreateVerificationCodesParamsShape>
     */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $phone_numbers */
    #[Api(list: 'string')]
    public array $phone_numbers;

    /** @var value-of<VerificationMethod> $verification_method */
    #[Api(enum: VerificationMethod::class)]
    public string $verification_method;

    /**
     * `new MessagingHostedNumberOrderCreateVerificationCodesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingHostedNumberOrderCreateVerificationCodesParams::with(
     *   phone_numbers: ..., verification_method: ...
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
     * @param list<string> $phone_numbers
     * @param VerificationMethod|value-of<VerificationMethod> $verification_method
     */
    public static function with(
        array $phone_numbers,
        VerificationMethod|string $verification_method
    ): self {
        $obj = new self;

        $obj->phone_numbers = $phone_numbers;
        $obj['verification_method'] = $verification_method;

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
