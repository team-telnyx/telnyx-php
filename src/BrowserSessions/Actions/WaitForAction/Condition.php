<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\WaitForAction;

use Telnyx\BrowserSessions\Actions\WaitForAction\Condition\Kind;
use Telnyx\BrowserSessions\Actions\WaitForAction\Condition\UnionMember0;
use Telnyx\BrowserSessions\Actions\WaitForAction\Condition\UnionMember1;
use Telnyx\BrowserSessions\Actions\WaitForAction\Condition\UnionMember2;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type UnionMember0Shape from \Telnyx\BrowserSessions\Actions\WaitForAction\Condition\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \Telnyx\BrowserSessions\Actions\WaitForAction\Condition\UnionMember1
 * @phpstan-import-type UnionMember2Shape from \Telnyx\BrowserSessions\Actions\WaitForAction\Condition\UnionMember2
 * @phpstan-import-type KindShape from \Telnyx\BrowserSessions\Actions\WaitForAction\Condition\Kind
 *
 * @phpstan-type ConditionVariants = UnionMember0|UnionMember1|UnionMember2|Kind
 * @phpstan-type ConditionShape = ConditionVariants|UnionMember0Shape|UnionMember1Shape|UnionMember2Shape|KindShape
 */
final class Condition implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            UnionMember0::class, UnionMember1::class, UnionMember2::class, Kind::class,
        ];
    }
}
