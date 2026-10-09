<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SpendLimitShape from \Telnyx\SpendLimits\SpendLimit
 *
 * @phpstan-type SpendLimitResponseShape = array{data: SpendLimit|SpendLimitShape}
 */
final class SpendLimitResponse implements BaseModel
{
    /** @use SdkModel<SpendLimitResponseShape> */
    use SdkModel;

    /**
     * The spend limit, spend and block state of one product and period.
     */
    #[Required]
    public SpendLimit $data;

    /**
     * `new SpendLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendLimitResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendLimitResponse)->withData(...)
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
     * @param SpendLimit|SpendLimitShape $data
     */
    public static function with(SpendLimit|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * The spend limit, spend and block state of one product and period.
     *
     * @param SpendLimit|SpendLimitShape $data
     */
    public function withData(SpendLimit|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
