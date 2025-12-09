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
 *   existingThisMonth: MonthDetail,
 *   name: string,
 *   newThisMonth: MonthDetail,
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

    #[Required('existing_this_month')]
    public MonthDetail $existingThisMonth;

    /**
     * Service name.
     */
    #[Required]
    public string $name;

    #[Required('new_this_month')]
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
     *
     * @param MonthDetail|array{
     *   mrc: string, quantity: int, otc?: string|null
     * } $existingThisMonth
     * @param MonthDetail|array{
     *   mrc: string, quantity: int, otc?: string|null
     * } $newThisMonth
     */
    public static function with(
        string $alias,
        MonthDetail|array $existingThisMonth,
        string $name,
        MonthDetail|array $newThisMonth,
    ): self {
        $obj = new self;

        $obj['alias'] = $alias;
        $obj['existingThisMonth'] = $existingThisMonth;
        $obj['name'] = $name;
        $obj['newThisMonth'] = $newThisMonth;

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
        $obj['existingThisMonth'] = $existingThisMonth;

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
        $obj['newThisMonth'] = $newThisMonth;

        return $obj;
    }
}
