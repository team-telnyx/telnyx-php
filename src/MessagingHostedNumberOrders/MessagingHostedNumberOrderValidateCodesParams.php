<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode;

/**
 * Validate the verification codes sent to the numbers of the hosted order. The verification codes must be created in the verification codes endpoint.
 *
 * @see Telnyx\Services\MessagingHostedNumberOrdersService::validateCodes()
 *
 * @phpstan-import-type VerificationCodeShape from \Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode
 *
 * @phpstan-type MessagingHostedNumberOrderValidateCodesParamsShape = array{
 *   verificationCodes: list<VerificationCode|VerificationCodeShape>
 * }
 */
final class MessagingHostedNumberOrderValidateCodesParams implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderValidateCodesParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<VerificationCode> $verificationCodes */
    #[Required('verification_codes', list: VerificationCode::class)]
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
     * @param list<VerificationCode|VerificationCodeShape> $verificationCodes
     */
    public static function with(array $verificationCodes): self
    {
        $self = new self;

        $self['verificationCodes'] = $verificationCodes;

        return $self;
    }

    /**
     * @param list<VerificationCode|VerificationCodeShape> $verificationCodes
     */
    public function withVerificationCodes(array $verificationCodes): self
    {
        $self = clone $this;
        $self['verificationCodes'] = $verificationCodes;

        return $self;
    }
}
