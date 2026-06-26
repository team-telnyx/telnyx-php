<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\ApplicationDefault;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\WithTeXml;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\WithURL;

/**
 * @phpstan-import-type WithURLShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\WithURL
 * @phpstan-import-type WithTeXmlShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\WithTeXml
 * @phpstan-import-type ApplicationDefaultShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\ApplicationDefault
 *
 * @phpstan-type ParamsVariants = WithURL|WithTeXml|ApplicationDefault
 * @phpstan-type ParamsShape = ParamsVariants|WithURLShape|WithTeXmlShape|ApplicationDefaultShape
 */
final class Params implements ConverterSource
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
