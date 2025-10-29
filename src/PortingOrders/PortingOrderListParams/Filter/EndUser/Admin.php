<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdminShape = array{authPersonName?: string, entityName?: string}
 */
final class Admin implements BaseModel
{
    /** @use SdkModel<AdminShape> */
    use SdkModel;

    /**
     * Filter results by authorized person.
     */
    #[Api('auth_person_name', optional: true)]
    public ?string $authPersonName;

    /**
     * Filter results by person or company name.
     */
    #[Api('entity_name', optional: true)]
    public ?string $entityName;

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
        ?string $authPersonName = null,
        ?string $entityName = null
    ): self {
        $obj = new self;

        null !== $authPersonName && $obj->authPersonName = $authPersonName;
        null !== $entityName && $obj->entityName = $entityName;

        return $obj;
    }

    /**
     * Filter results by authorized person.
     */
    public function withAuthPersonName(string $authPersonName): self
    {
        $obj = clone $this;
        $obj->authPersonName = $authPersonName;

        return $obj;
    }

    /**
     * Filter results by person or company name.
     */
    public function withEntityName(string $entityName): self
    {
        $obj = clone $this;
        $obj->entityName = $entityName;

        return $obj;
    }
}
