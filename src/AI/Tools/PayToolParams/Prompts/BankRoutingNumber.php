<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools\PayToolParams\Prompts;

use Telnyx\AI\Tools\PayToolParams\Prompts\BankRoutingNumber\PayToolPromptList;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * A default prompt string or an ordered list of qualified prompts.
 *
 * @phpstan-import-type PayToolPromptListShape from \Telnyx\AI\Tools\PayToolParams\Prompts\BankRoutingNumber\PayToolPromptList
 *
 * @phpstan-type BankRoutingNumberVariants = string|list<PayToolPromptList>
 * @phpstan-type BankRoutingNumberShape = BankRoutingNumberVariants|list<PayToolPromptListShape>
 */
final class BankRoutingNumber implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new ListOf(PayToolPromptList::class)];
    }
}
