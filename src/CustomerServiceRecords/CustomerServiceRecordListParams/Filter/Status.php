<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\Eq;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\In;

/**
 * @phpstan-type status_alias = array{eq?: value-of<Eq>, in?: list<value-of<In>>}
 */
final class Status implements BaseModel
{
    /** @use SdkModel<status_alias> */
    use SdkModel;

    /**
     * Filters records to those with a specific status.
     *
     * @var value-of<Eq>|null $eq
     */
    #[Api(enum: Eq::class, optional: true)]
    public ?string $eq;

    /**
     * Filters records to those with a least one status in the list.
     *
     * @var list<value-of<In>>|null $in
     */
    #[Api(list: In::class, optional: true)]
    public ?array $in;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Eq|value-of<Eq> $eq
     * @param list<In|value-of<In>> $in
     */
    public static function with(Eq|string|null $eq = null, ?array $in = null): self
    {
        $obj = new self;

        null !== $eq && $obj['eq'] = $eq;
        null !== $in && $obj['in'] = $in;

        return $obj;
    }

    /**
     * Filters records to those with a specific status.
     *
     * @param Eq|value-of<Eq> $eq
     */
    public function withEq(Eq|string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * Filters records to those with a least one status in the list.
     *
     * @param list<In|value-of<In>> $in
     */
    public function withIn(array $in): self
    {
        $obj = clone $this;
        $obj['in'] = $in;

        return $obj;
    }
}
