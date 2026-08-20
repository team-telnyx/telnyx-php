<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\ApplicationDefault;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\WithTeXml;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\WithURL;

/**
 * @phpstan-import-type WithURLShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\WithURL
 * @phpstan-import-type WithTeXmlShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\WithTeXml
 * @phpstan-import-type ApplicationDefaultShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\ApplicationDefault
 *
 * @phpstan-type BodyVariants = WithURL|WithTeXml|ApplicationDefault
 * @phpstan-type BodyShape = BodyVariants|WithURLShape|WithTeXmlShape|ApplicationDefaultShape
 */
final class Body implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [WithURL::class, WithTeXml::class, ApplicationDefault::class];
    }
}
