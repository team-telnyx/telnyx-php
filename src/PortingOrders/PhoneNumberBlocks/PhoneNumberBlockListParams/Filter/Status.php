<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\PortingOrderMultipleStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\PortingOrderStatusList;

/**
 * Filter porting orders by status(es). Originally: filter[status], filter[status][in][].
 *
 * @phpstan-type StatusVariants = list<value-of<PortingOrderStatusList>>|value-of<PortingOrderMultipleStatus>
 * @phpstan-type StatusShape = StatusVariants
 */
final class Status implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PortingOrderMultipleStatus::class,
            new ListOf(PortingOrderStatusList::class),
        ];
    }
}
