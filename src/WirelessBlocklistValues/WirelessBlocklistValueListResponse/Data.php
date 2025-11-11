<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data\Country;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data\Mcc;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data\Plmn;

final class Data implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            new ListOf(Country::class),
            new ListOf(Mcc::class),
            new ListOf(Plmn::class),
        ];
    }
}
