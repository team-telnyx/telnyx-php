<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder\Status;

/**
 * @phpstan-type porting_order = array{status?: list<value-of<Status>>}
 */
final class PortingOrder implements BaseModel
{
    /** @use SdkModel<porting_order> */
    use SdkModel;

    /**
     * Filter results by specific porting order statuses.
     *
     * @var list<value-of<Status>>|null $status
     */
    #[Api(list: Status::class, optional: true)]
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
     * @param list<Status|value-of<Status>> $status
     */
    public static function with(?array $status = null): self
    {
        $obj = new self;

        null !== $status && $obj->status = array_map(fn ($v) => $v instanceof Status ? $v->value : $v, $status);

        return $obj;
    }

    /**
     * Filter results by specific porting order statuses.
     *
     * @param list<Status|value-of<Status>> $status
     */
    public function withStatus(array $status): self
    {
        $obj = clone $this;
        $obj->status = array_map(fn ($v) => $v instanceof Status ? $v->value : $v, $status);

        return $obj;
    }
}
