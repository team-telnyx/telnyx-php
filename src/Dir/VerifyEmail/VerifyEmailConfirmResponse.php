<?php

declare(strict_types=1);

namespace Telnyx\Dir\VerifyEmail;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Dir\VerifyEmail\VerifyEmailConfirmResponse\Data
 *
 * @phpstan-type VerifyEmailConfirmResponseShape = array{data: Data|DataShape}
 */
final class VerifyEmailConfirmResponse implements BaseModel
{
    /** @use SdkModel<VerifyEmailConfirmResponseShape> */
    use SdkModel;

    /**
     * Verification state for a DIR's authorizer email.
     */
    #[Required]
    public Data $data;

    /**
     * `new VerifyEmailConfirmResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyEmailConfirmResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyEmailConfirmResponse)->withData(...)
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
     * Verification state for a DIR's authorizer email.
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
