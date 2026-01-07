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

/**
 * @phpstan-import-type CountryShape from \Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data\Country
 * @phpstan-import-type MccShape from \Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data\Mcc
 * @phpstan-import-type PlmnShape from \Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data\Plmn
 *
 * @phpstan-type DataVariants = list<Country>|list<Mcc>|list<Plmn>
 * @phpstan-type DataShape = DataVariants|list<CountryShape>|list<MccShape>|list<PlmnShape>
 */
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
