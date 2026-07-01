<?php

declare(strict_types=1);

namespace Telnyx\InfringementClaims;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InfringementClaimShape from \Telnyx\InfringementClaims\InfringementClaim
 *
 * @phpstan-type InfringementClaimWrappedShape = array{
 *   data: InfringementClaim|InfringementClaimShape
 * }
 */
final class InfringementClaimWrapped implements BaseModel
{
    /** @use SdkModel<InfringementClaimWrappedShape> */
    use SdkModel;

    #[Required]
    public InfringementClaim $data;

    /**
     * `new InfringementClaimWrapped()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InfringementClaimWrapped::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InfringementClaimWrapped)->withData(...)
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
     * @param InfringementClaim|InfringementClaimShape $data
     */
    public static function with(InfringementClaim|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param InfringementClaim|InfringementClaimShape $data
     */
    public function withData(InfringementClaim|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
