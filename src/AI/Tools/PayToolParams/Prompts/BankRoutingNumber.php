<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools\PayToolParams\Prompts;

use Telnyx\AI\Tools\PayToolParams\Prompts\BankRoutingNumber\UnionMember1;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * A default prompt string or an ordered list of qualified prompts.
 *
 * @phpstan-import-type UnionMember1Shape from \Telnyx\AI\Tools\PayToolParams\Prompts\BankRoutingNumber\UnionMember1
 *
 * @phpstan-type BankRoutingNumberVariants = string|list<UnionMember1>
 * @phpstan-type BankRoutingNumberShape = BankRoutingNumberVariants|list<UnionMember1Shape>
 */
final class BankRoutingNumber implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new ListOf(UnionMember1::class)];
    }
}
