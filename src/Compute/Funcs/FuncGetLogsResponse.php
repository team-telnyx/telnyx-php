<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs;

use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncInvocationLogsResponse;
use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type FuncRuntimeLogsResponseShape from \Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse
 * @phpstan-import-type FuncInvocationLogsResponseShape from \Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncInvocationLogsResponse
 *
 * @phpstan-type FuncGetLogsResponseVariants = FuncRuntimeLogsResponse|FuncInvocationLogsResponse
 * @phpstan-type FuncGetLogsResponseShape = FuncGetLogsResponseVariants|FuncRuntimeLogsResponseShape|FuncInvocationLogsResponseShape
 */
final class FuncGetLogsResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [FuncRuntimeLogsResponse::class, FuncInvocationLogsResponse::class];
    }
}
