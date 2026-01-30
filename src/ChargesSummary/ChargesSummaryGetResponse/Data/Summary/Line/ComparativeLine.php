<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line;

use Telnyx\ChargesSummary\MonthDetail;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MonthDetailShape from \Telnyx\ChargesSummary\MonthDetail
 *
 * @phpstan-type ComparativeLineShape = array{
 *   alias: string,
 *   existingThisMonth: MonthDetail|MonthDetailShape,
 *   name: string,
 *   newThisMonth: MonthDetail|MonthDetailShape,
 *   type: 'comparative',
 * }
 */
final class ComparativeLine implements BaseModel
{
    /** @use SdkModel<ComparativeLineShape> */
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
     * `new ComparativeLine()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ComparativeLine::with(
     *   alias: ..., existingThisMonth: ..., name: ..., newThisMonth: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ComparativeLine)
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
     * @param MonthDetail|MonthDetailShape $existingThisMonth
     * @param MonthDetail|MonthDetailShape $newThisMonth
     */
    public static function with(
        string $alias,
        MonthDetail|array $existingThisMonth,
        string $name,
        MonthDetail|array $newThisMonth,
    ): self {
        $self = new self;

        $self['alias'] = $alias;
        $self['existingThisMonth'] = $existingThisMonth;
        $self['name'] = $name;
        $self['newThisMonth'] = $newThisMonth;

        return $self;
    }

    /**
     * Service alias.
     */
    public function withAlias(string $alias): self
    {
        $self = clone $this;
        $self['alias'] = $alias;

        return $self;
    }

    /**
     * @param MonthDetail|MonthDetailShape $existingThisMonth
     */
    public function withExistingThisMonth(
        MonthDetail|array $existingThisMonth
    ): self {
        $self = clone $this;
        $self['existingThisMonth'] = $existingThisMonth;

        return $self;
    }

    /**
     * Service name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param MonthDetail|MonthDetailShape $newThisMonth
     */
    public function withNewThisMonth(MonthDetail|array $newThisMonth): self
    {
        $self = clone $this;
        $self['newThisMonth'] = $newThisMonth;

        return $self;
    }

    /**
     * @param 'comparative' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
