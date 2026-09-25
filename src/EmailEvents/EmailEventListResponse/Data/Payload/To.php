<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListResponse\Data\Payload;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\EmailEvents\EmailWebhookRecipient;

/**
 * Legacy message-scoped address, or an empty string when absent.
 *
 * @phpstan-import-type EmailWebhookRecipientShape from \Telnyx\EmailEvents\EmailWebhookRecipient
 *
 * @phpstan-type ToVariants = string|EmailWebhookRecipient
 * @phpstan-type ToShape = ToVariants|EmailWebhookRecipientShape
 */
final class To implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [EmailWebhookRecipient::class, 'string'];
    }
}
