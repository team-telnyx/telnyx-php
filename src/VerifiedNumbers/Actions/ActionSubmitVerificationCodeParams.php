<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submit verification code.
 *
 * @see Telnyx\Services\VerifiedNumbers\ActionsService::submitVerificationCode()
 *
 * @phpstan-type ActionSubmitVerificationCodeParamsShape = array{
 *   verificationCode: string
 * }
 */
final class ActionSubmitVerificationCodeParams implements BaseModel
{
    /** @use SdkModel<ActionSubmitVerificationCodeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('verification_code')]
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
        $self = new self;

        $self['verificationCode'] = $verificationCode;

        return $self;
    }

    public function withVerificationCode(string $verificationCode): self
    {
        $self = clone $this;
        $self['verificationCode'] = $verificationCode;

        return $self;
    }
}
