<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Whatsapp\Templates\WhatsappTemplateBodyComponent;
use Telnyx\Whatsapp\Templates\WhatsappTemplateButtonsComponent;
use Telnyx\Whatsapp\Templates\WhatsappTemplateCarouselComponent;
use Telnyx\Whatsapp\Templates\WhatsappTemplateFooterComponent;
use Telnyx\Whatsapp\Templates\WhatsappTemplateHeaderComponent;

/**
 * A template component. Additional Meta component types not listed here are also accepted.
 *
 * @phpstan-import-type WhatsappTemplateHeaderComponentShape from \Telnyx\Whatsapp\Templates\WhatsappTemplateHeaderComponent
 * @phpstan-import-type WhatsappTemplateBodyComponentShape from \Telnyx\Whatsapp\Templates\WhatsappTemplateBodyComponent
 * @phpstan-import-type WhatsappTemplateFooterComponentShape from \Telnyx\Whatsapp\Templates\WhatsappTemplateFooterComponent
 * @phpstan-import-type WhatsappTemplateButtonsComponentShape from \Telnyx\Whatsapp\Templates\WhatsappTemplateButtonsComponent
 * @phpstan-import-type WhatsappTemplateCarouselComponentShape from \Telnyx\Whatsapp\Templates\WhatsappTemplateCarouselComponent
 *
 * @phpstan-type ComponentVariants = WhatsappTemplateHeaderComponent|WhatsappTemplateBodyComponent|WhatsappTemplateFooterComponent|WhatsappTemplateButtonsComponent|WhatsappTemplateCarouselComponent
 * @phpstan-type ComponentShape = ComponentVariants|WhatsappTemplateHeaderComponentShape|WhatsappTemplateBodyComponentShape|WhatsappTemplateFooterComponentShape|WhatsappTemplateButtonsComponentShape|WhatsappTemplateCarouselComponentShape
 */
final class Component implements ConverterSource
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
            'HEADER' => WhatsappTemplateHeaderComponent::class,
            'BODY' => WhatsappTemplateBodyComponent::class,
            'FOOTER' => WhatsappTemplateFooterComponent::class,
            'BUTTONS' => WhatsappTemplateButtonsComponent::class,
            'CAROUSEL' => WhatsappTemplateCarouselComponent::class,
        ];
    }
}
