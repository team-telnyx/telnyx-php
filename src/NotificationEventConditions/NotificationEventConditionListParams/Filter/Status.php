<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\Status\Eq;

/**
 * @phpstan-type status_alias = array{eq?: value-of<Eq>}
 */
final class Status implements BaseModel
{
    /** @use SdkModel<status_alias> */
    use SdkModel;

    /**
     * The status of a notification setting.
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
     * The status of a notification setting.
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
