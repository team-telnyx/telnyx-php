<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type WebhookPortoutStatusChangedShape from \Telnyx\Portouts\Events\WebhookPortoutStatusChanged
 * @phpstan-import-type WebhookPortoutNewCommentShape from \Telnyx\Portouts\Events\WebhookPortoutNewComment
 * @phpstan-import-type WebhookPortoutFocDateChangedShape from \Telnyx\Portouts\Events\WebhookPortoutFocDateChanged
 *
 * @phpstan-type EventListResponseVariants = WebhookPortoutStatusChanged|WebhookPortoutNewComment|WebhookPortoutFocDateChanged
 * @phpstan-type EventListResponseShape = EventListResponseVariants|WebhookPortoutStatusChangedShape|WebhookPortoutNewCommentShape|WebhookPortoutFocDateChangedShape
 */
final class EventListResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            WebhookPortoutStatusChanged::class,
            WebhookPortoutNewComment::class,
            WebhookPortoutFocDateChanged::class,
        ];
    }
}
