<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\VerifyEmail;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submit the 6-digit code that was emailed to the enterprise account's contact email. On success the contact email is marked verified.
 *
 * For security, any failure (wrong, expired, already-used, or too many attempts) returns the same generic message.
 *
 * @see Telnyx\Services\Enterprises\VerifyEmailService::confirm()
 *
 * @phpstan-type VerifyEmailConfirmParamsShape = array{code: string}
 */
final class VerifyEmailConfirmParams implements BaseModel
{
    /** @use SdkModel<VerifyEmailConfirmParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The 6-digit code sent to the enterprise account's contact email.
     */
    #[Required]
    public string $code;

    /**
     * `new VerifyEmailConfirmParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyEmailConfirmParams::with(code: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyEmailConfirmParams)->withCode(...)
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
     * The 6-digit code sent to the enterprise account's contact email.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }
}
