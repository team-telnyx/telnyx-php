<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\Eq;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\In;

/**
 * @phpstan-type StatusShape = array{
 *   eq?: null|Eq|value-of<Eq>, in?: list<In|value-of<In>>|null
 * }
 */
final class Status implements BaseModel
{
    /** @use SdkModel<StatusShape> */
    use SdkModel;

    /**
     * Filters records to those with a specific status.
     *
     * @var value-of<Eq>|null $eq
     */
    #[Optional(enum: Eq::class)]
    public ?string $eq;

    /**
     * Filters records to those with a least one status in the list.
     *
     * @var list<value-of<In>>|null $in
     */
    #[Optional(list: In::class)]
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
        $self = new self;

        null !== $eq && $self['eq'] = $eq;
        null !== $in && $self['in'] = $in;

        return $self;
    }

    /**
     * Filters records to those with a specific status.
     *
     * @param Eq|value-of<Eq> $eq
     */
    public function withEq(Eq|string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }

    /**
     * Filters records to those with a least one status in the list.
     *
     * @param list<In|value-of<In>> $in
     */
    public function withIn(array $in): self
    {
        $self = clone $this;
        $self['in'] = $in;

        return $self;
    }
}
