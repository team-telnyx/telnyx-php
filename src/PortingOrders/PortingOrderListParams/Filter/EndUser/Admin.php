<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdminShape = array{
 *   auth_person_name?: string|null, entity_name?: string|null
 * }
 */
final class Admin implements BaseModel
{
    /** @use SdkModel<AdminShape> */
    use SdkModel;

    /**
     * Filter results by authorized person.
     */
    #[Optional]
    public ?string $auth_person_name;

    /**
     * Filter results by person or company name.
     */
    #[Optional]
    public ?string $entity_name;

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
        ?string $auth_person_name = null,
        ?string $entity_name = null
    ): self {
        $obj = new self;

        null !== $auth_person_name && $obj['auth_person_name'] = $auth_person_name;
        null !== $entity_name && $obj['entity_name'] = $entity_name;

        return $obj;
    }

    /**
     * Filter results by authorized person.
     */
    public function withAuthPersonName(string $authPersonName): self
    {
        $obj = clone $this;
        $obj['auth_person_name'] = $authPersonName;

        return $obj;
    }

    /**
     * Filter results by person or company name.
     */
    public function withEntityName(string $entityName): self
    {
        $obj = clone $this;
        $obj['entity_name'] = $entityName;

        return $obj;
    }
}
