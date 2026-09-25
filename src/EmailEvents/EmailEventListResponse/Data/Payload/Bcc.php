<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListResponse\Data\Payload;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\Bcc\UnionMember1;
use Telnyx\EmailEvents\EmailWebhookRecipient;

/**
 * @phpstan-import-type EmailWebhookRecipientShape from \Telnyx\EmailEvents\EmailWebhookRecipient
 *
 * @phpstan-type BccVariants = EmailWebhookRecipient|value-of<UnionMember1>
 * @phpstan-type BccShape = BccVariants|EmailWebhookRecipientShape
 */
final class Bcc implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [EmailWebhookRecipient::class, UnionMember1::class];
    }
}
