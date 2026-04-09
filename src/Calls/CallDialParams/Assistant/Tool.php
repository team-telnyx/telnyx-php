<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams\Assistant;

use Telnyx\AI\Assistants\HangupTool;
use Telnyx\AI\Assistants\TransferTool;
use Telnyx\AI\Assistants\WebhookTool;
use Telnyx\Calls\CallDialParams\Assistant\Tool\BookAppointmentTool;
use Telnyx\Calls\CallDialParams\Assistant\Tool\CallControlRetrievalTool;
use Telnyx\Calls\CallDialParams\Assistant\Tool\CheckAvailabilityTool;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type BookAppointmentToolShape from \Telnyx\Calls\CallDialParams\Assistant\Tool\BookAppointmentTool
 * @phpstan-import-type CheckAvailabilityToolShape from \Telnyx\Calls\CallDialParams\Assistant\Tool\CheckAvailabilityTool
 * @phpstan-import-type WebhookToolShape from \Telnyx\AI\Assistants\WebhookTool
 * @phpstan-import-type HangupToolShape from \Telnyx\AI\Assistants\HangupTool
 * @phpstan-import-type TransferToolShape from \Telnyx\AI\Assistants\TransferTool
 * @phpstan-import-type CallControlRetrievalToolShape from \Telnyx\Calls\CallDialParams\Assistant\Tool\CallControlRetrievalTool
 *
 * @phpstan-type ToolVariants = BookAppointmentTool|CheckAvailabilityTool|WebhookTool|HangupTool|TransferTool|CallControlRetrievalTool
 * @phpstan-type ToolShape = ToolVariants|BookAppointmentToolShape|CheckAvailabilityToolShape|WebhookToolShape|HangupToolShape|TransferToolShape|CallControlRetrievalToolShape
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
            'retrieval' => CallControlRetrievalTool::class,
        ];
    }
}
