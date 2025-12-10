<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Campaign\Usecase;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get Campaign Cost.
 *
 * @see Telnyx\Services\Number10dlc\Campaign\UsecaseService::getCost()
 *
 * @phpstan-type UsecaseGetCostParamsShape = array{usecase: string}
 */
final class UsecaseGetCostParams implements BaseModel
{
    /** @use SdkModel<UsecaseGetCostParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $usecase;

    /**
     * `new UsecaseGetCostParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsecaseGetCostParams::with(usecase: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsecaseGetCostParams)->withUsecase(...)
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
    public static function with(string $usecase): self
    {
        $self = new self;

        $self['usecase'] = $usecase;

        return $self;
    }

    public function withUsecase(string $usecase): self
    {
        $self = clone $this;
        $self['usecase'] = $usecase;

        return $self;
    }
}
