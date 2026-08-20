<?php

declare(strict_types=1);

namespace Telnyx\Dir\VerifyEmail;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailVerificationStatusShape from \Telnyx\Dir\VerifyEmail\EmailVerificationStatus
 *
 * @phpstan-type EmailVerificationStatusWrappedShape = array{
 *   data: EmailVerificationStatus|EmailVerificationStatusShape
 * }
 */
final class EmailVerificationStatusWrapped implements BaseModel
{
    /** @use SdkModel<EmailVerificationStatusWrappedShape> */
    use SdkModel;

    /**
     * Verification state for a DIR's authorizer email.
     */
    #[Required]
    public EmailVerificationStatus $data;

    /**
     * `new EmailVerificationStatusWrapped()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailVerificationStatusWrapped::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailVerificationStatusWrapped)->withData(...)
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
     * @param EmailVerificationStatus|EmailVerificationStatusShape $data
     */
    public static function with(EmailVerificationStatus|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Verification state for a DIR's authorizer email.
     *
     * @param EmailVerificationStatus|EmailVerificationStatusShape $data
     */
    public function withData(EmailVerificationStatus|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
