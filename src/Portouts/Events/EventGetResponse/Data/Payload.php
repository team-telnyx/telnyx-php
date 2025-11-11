<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventGetResponse\Data;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutFocDateChangedPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutNewCommentPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutStatusChangedPayload;

/**
 * The webhook payload for the portout.status_changed event.
 */
final class Payload implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            WebhookPortoutStatusChangedPayload::class,
            WebhookPortoutNewCommentPayload::class,
            WebhookPortoutFocDateChangedPayload::class,
        ];
    }
}
