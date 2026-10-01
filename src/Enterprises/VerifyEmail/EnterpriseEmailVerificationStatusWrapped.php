<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\VerifyEmail;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped\Data
 *
 * @phpstan-type EnterpriseEmailVerificationStatusWrappedShape = array{
 *   data: Data|DataShape
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
    public Data $data;

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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Verification state for an enterprise account's contact email.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
