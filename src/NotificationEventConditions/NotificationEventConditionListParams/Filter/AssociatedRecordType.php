<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\AssociatedRecordType\Eq;

/**
 * @phpstan-type associated_record_type = array{eq?: value-of<Eq>}
 */
final class AssociatedRecordType implements BaseModel
{
    /** @use SdkModel<associated_record_type> */
    use SdkModel;

    /**
     * Filter by the associated record type.
     *
     * @var value-of<Eq>|null $eq
     */
    #[Api(enum: Eq::class, optional: true)]
    public ?string $eq;

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
     */
    public static function with(Eq|string|null $eq = null): self
    {
        $obj = new self;

        null !== $eq && $obj->eq = $eq instanceof Eq ? $eq->value : $eq;

        return $obj;
    }

    /**
     * Filter by the associated record type.
     *
     * @param Eq|value-of<Eq> $eq
     */
    public function withEq(Eq|string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq instanceof Eq ? $eq->value : $eq;

        return $obj;
    }
}
