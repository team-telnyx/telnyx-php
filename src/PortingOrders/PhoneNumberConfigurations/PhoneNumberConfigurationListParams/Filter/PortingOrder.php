<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder\Status;

/**
 * @phpstan-type PortingOrderShape = array{
 *   status?: list<Status|value-of<Status>>|null
 * }
 */
final class PortingOrder implements BaseModel
{
    /** @use SdkModel<PortingOrderShape> */
    use SdkModel;

    /**
     * Filter results by specific porting order statuses.
     *
     * @var list<value-of<Status>>|null $status
     */
    #[Optional(list: Status::class)]
    public ?array $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Status|value-of<Status>>|null $status
     */
    public static function with(?array $status = null): self
    {
        $self = new self;

        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filter results by specific porting order statuses.
     *
     * @param list<Status|value-of<Status>> $status
     */
    public function withStatus(array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
