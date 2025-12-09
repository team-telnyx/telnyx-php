<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line;

use Telnyx\ChargesSummary\MonthDetail;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ComparativeShape = array{
 *   alias: string,
 *   existing_this_month: MonthDetail,
 *   name: string,
 *   new_this_month: MonthDetail,
 *   type?: 'comparative',
 * }
 */
final class Comparative implements BaseModel
{
    /** @use SdkModel<ComparativeShape> */
    use SdkModel;

    /** @var 'comparative' $type */
    #[Required]
    public string $type = 'comparative';

    /**
     * Service alias.
     */
    #[Required]
    public string $alias;

    #[Required]
    public MonthDetail $existing_this_month;

    /**
     * Service name.
     */
    #[Required]
    public string $name;

    #[Required]
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
     *
     * @param MonthDetail|array{
     *   mrc: string, quantity: int, otc?: string|null
     * } $existing_this_month
     * @param MonthDetail|array{
     *   mrc: string, quantity: int, otc?: string|null
     * } $new_this_month
     */
    public static function with(
        string $alias,
        MonthDetail|array $existing_this_month,
        string $name,
        MonthDetail|array $new_this_month,
    ): self {
        $obj = new self;

        $obj['alias'] = $alias;
        $obj['existing_this_month'] = $existing_this_month;
        $obj['name'] = $name;
        $obj['new_this_month'] = $new_this_month;

        return $obj;
    }

    /**
     * Service alias.
     */
    public function withAlias(string $alias): self
    {
        $obj = clone $this;
        $obj['alias'] = $alias;

        return $obj;
    }

    /**
     * @param MonthDetail|array{
     *   mrc: string, quantity: int, otc?: string|null
     * } $existingThisMonth
     */
    public function withExistingThisMonth(
        MonthDetail|array $existingThisMonth
    ): self {
        $obj = clone $this;
        $obj['existing_this_month'] = $existingThisMonth;

        return $obj;
    }

    /**
     * Service name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param MonthDetail|array{
     *   mrc: string, quantity: int, otc?: string|null
     * } $newThisMonth
     */
    public function withNewThisMonth(MonthDetail|array $newThisMonth): self
    {
        $obj = clone $this;
        $obj['new_this_month'] = $newThisMonth;

        return $obj;
    }
}
