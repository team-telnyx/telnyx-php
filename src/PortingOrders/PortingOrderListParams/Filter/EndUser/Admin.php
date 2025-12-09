<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdminShape = array{
 *   authPersonName?: string|null, entityName?: string|null
 * }
 */
final class Admin implements BaseModel
{
    /** @use SdkModel<AdminShape> */
    use SdkModel;

    /**
     * Filter results by authorized person.
     */
    #[Optional('auth_person_name')]
    public ?string $authPersonName;

    /**
     * Filter results by person or company name.
     */
    #[Optional('entity_name')]
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
        $self = new self;

        null !== $authPersonName && $self['authPersonName'] = $authPersonName;
        null !== $entityName && $self['entityName'] = $entityName;

        return $self;
    }

    /**
     * Filter results by authorized person.
     */
    public function withAuthPersonName(string $authPersonName): self
    {
        $self = clone $this;
        $self['authPersonName'] = $authPersonName;

        return $self;
    }

    /**
     * Filter results by person or company name.
     */
    public function withEntityName(string $entityName): self
    {
        $self = clone $this;
        $self['entityName'] = $entityName;

        return $self;
    }
}
