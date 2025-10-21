<?php

declare(strict_types=1);

namespace Telnyx\Campaign\Usecase;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get Campaign Cost.
 *
 * @see Telnyx\Campaign\Usecase->getCost
 *
 * @phpstan-type usecase_get_cost_params = array{usecase: string}
 */
final class UsecaseGetCostParams implements BaseModel
{
    /** @use SdkModel<usecase_get_cost_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
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
        $obj = new self;

        $obj->usecase = $usecase;

        return $obj;
    }

    public function withUsecase(string $usecase): self
    {
        $obj = clone $this;
        $obj->usecase = $usecase;

        return $obj;
    }
}
