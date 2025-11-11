<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line;

use Telnyx\ChargesSummary\MonthDetail;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ComparativeShape = array{
 *   alias: string,
 *   existing_this_month: MonthDetail,
 *   name: string,
 *   new_this_month: MonthDetail,
 *   type: "comparative",
 * }
 */
final class Comparative implements BaseModel
{
    /** @use SdkModel<ComparativeShape> */
    use SdkModel;

    /** @var "comparative" $type */
    #[Api]
    public string $type = 'comparative';

    /**
     * Service alias.
     */
    #[Api]
    public string $alias;

    #[Api]
    public MonthDetail $existing_this_month;

    /**
     * Service name.
     */
    #[Api]
    public string $name;

    #[Api]
    public MonthDetail $new_this_month;

    /**
     * `new Comparative()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Comparative::with(
     *   alias: ..., existing_this_month: ..., name: ..., new_this_month: ...
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
        MonthDetail $existing_this_month,
        string $name,
        MonthDetail $new_this_month,
    ): self {
        $obj = new self;

        $obj->alias = $alias;
        $obj->existing_this_month = $existing_this_month;
        $obj->name = $name;
        $obj->new_this_month = $new_this_month;

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
        $obj->existing_this_month = $existingThisMonth;

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
        $obj->new_this_month = $newThisMonth;

        return $obj;
    }
}
