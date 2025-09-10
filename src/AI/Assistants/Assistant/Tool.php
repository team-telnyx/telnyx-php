<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant;

use Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool;
use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool;
use Telnyx\AI\Assistants\HangupTool;
use Telnyx\AI\Assistants\RetrievalTool;
use Telnyx\AI\Assistants\TransferTool;
use Telnyx\AI\Assistants\WebhookTool;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

final class Tool implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            BookAppointmentTool::class,
            CheckAvailabilityTool::class,
            WebhookTool::class,
            HangupTool::class,
            TransferTool::class,
            RetrievalTool::class,
        ];
    }
}
