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

/**
 * @phpstan-import-type BookAppointmentToolShape from \Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool
 * @phpstan-import-type CheckAvailabilityToolShape from \Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool
 * @phpstan-import-type WebhookToolShape from \Telnyx\AI\Assistants\WebhookTool
 * @phpstan-import-type HangupToolShape from \Telnyx\AI\Assistants\HangupTool
 * @phpstan-import-type TransferToolShape from \Telnyx\AI\Assistants\TransferTool
 * @phpstan-import-type RetrievalToolShape from \Telnyx\AI\Assistants\RetrievalTool
 *
 * @phpstan-type ToolVariants = BookAppointmentTool|CheckAvailabilityTool|WebhookTool|HangupTool|TransferTool|RetrievalTool
 * @phpstan-type ToolShape = ToolVariants|BookAppointmentToolShape|CheckAvailabilityToolShape|WebhookToolShape|HangupToolShape|TransferToolShape|RetrievalToolShape
 */
final class Tool implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'book_appointment' => BookAppointmentTool::class,
            'check_availability' => CheckAvailabilityTool::class,
            'webhook' => WebhookTool::class,
            'hangup' => HangupTool::class,
            'transfer' => TransferTool::class,
            'retrieval' => RetrievalTool::class,
        ];
    }
}
