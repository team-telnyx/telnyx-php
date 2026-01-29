<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventGetResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutFocDateChanged;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutNewComment;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged;

/**
 * @phpstan-import-type WebhookPortoutStatusChangedShape from \Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged
 * @phpstan-import-type WebhookPortoutNewCommentShape from \Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutNewComment
 * @phpstan-import-type WebhookPortoutFocDateChangedShape from \Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutFocDateChanged
 *
 * @phpstan-type DataVariants = WebhookPortoutStatusChanged|WebhookPortoutNewComment|WebhookPortoutFocDateChanged
 * @phpstan-type DataShape = DataVariants|WebhookPortoutStatusChangedShape|WebhookPortoutNewCommentShape|WebhookPortoutFocDateChangedShape
 */
final class Data implements ConverterSource
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
