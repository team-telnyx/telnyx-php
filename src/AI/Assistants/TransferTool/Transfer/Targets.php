<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TransferTool\Transfer;

use Telnyx\AI\Assistants\TransferTool\Transfer\Targets\TargetsList;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to. This can also be a dynamic variable string like `{{ targets }}` where `targets` is returned by the dynamic variables webhook and resolves to an array of target objects at runtime.
 *
 * @phpstan-import-type TargetsListShape from \Telnyx\AI\Assistants\TransferTool\Transfer\Targets\TargetsList
 *
 * @phpstan-type TargetsVariants = string|list<TargetsList>
 * @phpstan-type TargetsShape = TargetsVariants|list<TargetsListShape>
 */
final class Targets implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new ListOf(TargetsList::class), 'string'];
    }
}
