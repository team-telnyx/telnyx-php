<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateBodyComponent;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateButtonsComponent;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateCarouselComponent;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateFooterComponent;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateHeaderComponent;

/**
 * A template component. Additional Meta component types not listed here are also accepted.
 *
 * @phpstan-import-type WhatsappTemplateHeaderComponentShape from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateHeaderComponent
 * @phpstan-import-type WhatsappTemplateBodyComponentShape from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateBodyComponent
 * @phpstan-import-type WhatsappTemplateFooterComponentShape from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateFooterComponent
 * @phpstan-import-type WhatsappTemplateButtonsComponentShape from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateButtonsComponent
 * @phpstan-import-type WhatsappTemplateCarouselComponentShape from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateCarouselComponent
 *
 * @phpstan-type ComponentVariants = WhatsappTemplateHeaderComponent|WhatsappTemplateBodyComponent|WhatsappTemplateFooterComponent|WhatsappTemplateButtonsComponent|WhatsappTemplateCarouselComponent
 * @phpstan-type ComponentShape = ComponentVariants|WhatsappTemplateHeaderComponentShape|WhatsappTemplateBodyComponentShape|WhatsappTemplateFooterComponentShape|WhatsappTemplateButtonsComponentShape|WhatsappTemplateCarouselComponentShape
 */
final class Component implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            WhatsappTemplateHeaderComponent::class,
            WhatsappTemplateBodyComponent::class,
            WhatsappTemplateFooterComponent::class,
            WhatsappTemplateButtonsComponent::class,
            WhatsappTemplateCarouselComponent::class,
        ];
    }
}
