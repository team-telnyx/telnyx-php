<?php

declare(strict_types=1);

namespace Telnyx\InfringementClaims;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InfringementClaims\InfringementClaimContestResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\InfringementClaims\InfringementClaimContestResponse\Data
 *
 * @phpstan-type InfringementClaimContestResponseShape = array{
 *   data: Data|DataShape
 * }
 */
final class InfringementClaimContestResponse implements BaseModel
{
    /** @use SdkModel<InfringementClaimContestResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new InfringementClaimContestResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InfringementClaimContestResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InfringementClaimContestResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
