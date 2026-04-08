<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateBodyComponent;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateCarouselComponent;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateFooterComponent;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateHeaderComponent;

/**
 * A template component. Additional Meta component types not listed here are also accepted.
 *
 * @phpstan-import-type WhatsappTemplateHeaderComponentShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateHeaderComponent
 * @phpstan-import-type WhatsappTemplateBodyComponentShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateBodyComponent
 * @phpstan-import-type WhatsappTemplateFooterComponentShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateFooterComponent
 * @phpstan-import-type WhatsappTemplateButtonsComponentShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent
 * @phpstan-import-type WhatsappTemplateCarouselComponentShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateCarouselComponent
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
