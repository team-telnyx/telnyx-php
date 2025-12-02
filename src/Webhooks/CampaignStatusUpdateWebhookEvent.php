<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent\CampaignStatusUpdateEvent;
use Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent\CampaignSuspendedEvent;

final class CampaignStatusUpdateWebhookEvent implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [CampaignStatusUpdateEvent::class, CampaignSuspendedEvent::class];
    }
}
