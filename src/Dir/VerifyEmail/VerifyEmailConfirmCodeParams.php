<?php

declare(strict_types=1);

namespace Telnyx\Dir\VerifyEmail;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submit the 6-digit code that was emailed to the DIR's authorizer email. On success the authorizer email is marked verified.
 *
 * For security, any failure (wrong, expired, already-used, or too many attempts) returns the same generic message.
 *
 * @see Telnyx\Services\Dir\VerifyEmailService::confirmCode()
 *
 * @phpstan-type VerifyEmailConfirmCodeParamsShape = array{code: string}
 */
final class VerifyEmailConfirmCodeParams implements BaseModel
{
    /** @use SdkModel<VerifyEmailConfirmCodeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The 6-digit code sent to the authorizer email.
     */
    #[Required]
    public string $code;

    /**
     * `new VerifyEmailConfirmCodeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyEmailConfirmCodeParams::with(code: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyEmailConfirmCodeParams)->withCode(...)
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
    public static function with(string $code): self
    {
        $self = new self;

        $self['code'] = $code;

        return $self;
    }

    /**
     * The 6-digit code sent to the authorizer email.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }
}
