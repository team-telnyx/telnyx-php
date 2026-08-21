<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\PayPromptValue\PayPromptList;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * A default prompt string or an ordered list of qualified prompts.
 *
 * @phpstan-import-type PayPromptListShape from \Telnyx\Calls\Actions\PayPromptValue\PayPromptList
 *
 * @phpstan-type PayPromptValueVariants = string|list<PayPromptList>
 * @phpstan-type PayPromptValueShape = PayPromptValueVariants|list<PayPromptListShape>
 */
final class PayPromptValue implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new ListOf(PayPromptList::class)];
    }
}
