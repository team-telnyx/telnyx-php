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
