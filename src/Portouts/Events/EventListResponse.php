<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Portouts\Events\EventListResponse\WebhookPortoutFocDateChanged;
use Telnyx\Portouts\Events\EventListResponse\WebhookPortoutNewComment;
use Telnyx\Portouts\Events\EventListResponse\WebhookPortoutStatusChanged;

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
