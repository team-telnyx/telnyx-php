<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line;

use Telnyx\ChargesSummary\MonthDetail;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type comparative_alias = array{
 *   alias: string,
 *   existingThisMonth: MonthDetail,
 *   name: string,
 *   newThisMonth: MonthDetail,
 *   type: string,
 * }
 */
final class Comparative implements BaseModel
{
    /** @use SdkModel<comparative_alias> */
    use SdkModel;

    #[Api]
    public string $type = 'comparative';

    /**
     * Service alias.
     */
    #[Api]
    public string $alias;

    #[Api('existing_this_month')]
    public MonthDetail $existingThisMonth;

    /**
     * Service name.
     */
    #[Api]
    public string $name;

    #[Api('new_this_month')]
    public MonthDetail $newThisMonth;

    /**
     * `new Comparative()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Comparative::with(
     *   alias: ..., existingThisMonth: ..., name: ..., newThisMonth: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Comparative)
     *   ->withAlias(...)
     *   ->withExistingThisMonth(...)
     *   ->withName(...)
     *   ->withNewThisMonth(...)
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
    public static function with(
        string $alias,
        MonthDetail $existingThisMonth,
        string $name,
        MonthDetail $newThisMonth,
    ): self {
        $obj = new self;

        $obj->alias = $alias;
        $obj->existingThisMonth = $existingThisMonth;
        $obj->name = $name;
        $obj->newThisMonth = $newThisMonth;

        return $obj;
    }

    /**
     * Service alias.
     */
    public function withAlias(string $alias): self
    {
        $obj = clone $this;
        $obj->alias = $alias;

        return $obj;
    }

    public function withExistingThisMonth(MonthDetail $existingThisMonth): self
    {
        $obj = clone $this;
        $obj->existingThisMonth = $existingThisMonth;

        return $obj;
    }

    /**
     * Service name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withNewThisMonth(MonthDetail $newThisMonth): self
    {
        $obj = clone $this;
        $obj->newThisMonth = $newThisMonth;

        return $obj;
    }
}
