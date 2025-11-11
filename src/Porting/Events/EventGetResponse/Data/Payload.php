<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderDeletedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderNewCommentPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderStatusChangedPayload;

/**
 * The webhook payload for the porting_order.deleted event.
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
            WebhookPortingOrderDeletedPayload::class,
            WebhookPortingOrderMessagingChangedPayload::class,
            WebhookPortingOrderStatusChangedPayload::class,
            WebhookPortingOrderNewCommentPayload::class,
            WebhookPortingOrderSplitPayload::class,
        ];
    }
}
