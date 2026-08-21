<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force\ForceString;

/**
 * Force-delete a group with active suppressions. Only `"true"` (string) or `true` (bool) are truthy; all other values are false.
 *
 * @phpstan-type ForceVariants = bool|value-of<ForceString>
 * @phpstan-type ForceShape = ForceVariants
 */
final class Force implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [ForceString::class, 'bool'];
    }
}
