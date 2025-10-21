<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode;

/**
 * Validate the verification codes sent to the numbers of the hosted order. The verification codes must be created in the verification codes endpoint.
 *
 * @see Telnyx\MessagingHostedNumberOrders->validateCodes
 *
 * @phpstan-type messaging_hosted_number_order_validate_codes_params = array{
 *   verificationCodes: list<VerificationCode>
 * }
 */
final class MessagingHostedNumberOrderValidateCodesParams implements BaseModel
{
    /** @use SdkModel<messaging_hosted_number_order_validate_codes_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<VerificationCode> $verificationCodes */
    #[Api('verification_codes', list: VerificationCode::class)]
    public array $verificationCodes;

    /**
     * `new MessagingHostedNumberOrderValidateCodesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingHostedNumberOrderValidateCodesParams::with(verificationCodes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingHostedNumberOrderValidateCodesParams)->withVerificationCodes(...)
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
     * @param list<VerificationCode> $verificationCodes
     */
    public static function with(array $verificationCodes): self
    {
        $obj = new self;

        $obj->verificationCodes = $verificationCodes;

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
