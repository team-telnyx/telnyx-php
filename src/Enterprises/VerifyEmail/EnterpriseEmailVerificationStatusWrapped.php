<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\VerifyEmail;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EnterpriseEmailVerificationStatusShape from \Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatus
 *
 * @phpstan-type EnterpriseEmailVerificationStatusWrappedShape = array{
 *   data: EnterpriseEmailVerificationStatus|EnterpriseEmailVerificationStatusShape
 * }
 */
final class EnterpriseEmailVerificationStatusWrapped implements BaseModel
{
    /** @use SdkModel<EnterpriseEmailVerificationStatusWrappedShape> */
    use SdkModel;

    /**
     * Verification state for an enterprise account's contact email.
     */
    #[Required]
    public EnterpriseEmailVerificationStatus $data;

    /**
     * `new EnterpriseEmailVerificationStatusWrapped()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EnterpriseEmailVerificationStatusWrapped::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EnterpriseEmailVerificationStatusWrapped)->withData(...)
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
     * @param EnterpriseEmailVerificationStatus|EnterpriseEmailVerificationStatusShape $data
     */
    public static function with(
        EnterpriseEmailVerificationStatus|array $data
    ): self {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Verification state for an enterprise account's contact email.
     *
     * @param EnterpriseEmailVerificationStatus|EnterpriseEmailVerificationStatusShape $data
     */
    public function withData(
        EnterpriseEmailVerificationStatus|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
