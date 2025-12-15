<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Button;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Button\Reply;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Button\Type;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Card;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Card\Body;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Card\Header;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Parameters;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Section;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Section\ProductItem;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Section\Row;

/**
 * @phpstan-type ActionShape = array{
 *   button?: string|null,
 *   buttons?: list<Button>|null,
 *   cards?: list<Card>|null,
 *   catalogID?: string|null,
 *   mode?: string|null,
 *   name?: string|null,
 *   parameters?: Parameters|null,
 *   productRetailerID?: string|null,
 *   sections?: list<Section>|null,
 * }
 */
final class Action implements BaseModel
{
    /** @use SdkModel<ActionShape> */
    use SdkModel;

    #[Optional]
    public ?string $button;

    /** @var list<Button>|null $buttons */
    #[Optional(list: Button::class)]
    public ?array $buttons;

    /** @var list<Card>|null $cards */
    #[Optional(list: Card::class)]
    public ?array $cards;

    #[Optional('catalog_id')]
    public ?string $catalogID;

    #[Optional]
    public ?string $mode;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?Parameters $parameters;

    #[Optional('product_retailer_id')]
    public ?string $productRetailerID;

    /** @var list<Section>|null $sections */
    #[Optional(list: Section::class)]
    public ?array $sections;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Button|array{
     *   reply?: Reply|null,
     *   type?: value-of<Type>|null,
     * }> $buttons
     * @param list<Card|array{
     *   action?: Card\Action|null,
     *   body?: Body|null,
     *   cardIndex?: int|null,
     *   header?: Header|null,
     *   type?: value-of<Card\Type>|null,
     * }> $cards
     * @param Parameters|array{
     *   displayText?: string|null, url?: string|null
     * } $parameters
     * @param list<Section|array{
     *   productItems?: list<ProductItem>|null,
     *   rows?: list<Row>|null,
     *   title?: string|null,
     * }> $sections
     */
    public static function with(
        ?string $button = null,
        ?array $buttons = null,
        ?array $cards = null,
        ?string $catalogID = null,
        ?string $mode = null,
        ?string $name = null,
        Parameters|array|null $parameters = null,
        ?string $productRetailerID = null,
        ?array $sections = null,
    ): self {
        $self = new self;

        null !== $button && $self['button'] = $button;
        null !== $buttons && $self['buttons'] = $buttons;
        null !== $cards && $self['cards'] = $cards;
        null !== $catalogID && $self['catalogID'] = $catalogID;
        null !== $mode && $self['mode'] = $mode;
        null !== $name && $self['name'] = $name;
        null !== $parameters && $self['parameters'] = $parameters;
        null !== $productRetailerID && $self['productRetailerID'] = $productRetailerID;
        null !== $sections && $self['sections'] = $sections;

        return $self;
    }

    public function withButton(string $button): self
    {
        $self = clone $this;
        $self['button'] = $button;

        return $self;
    }

    /**
     * @param list<Button|array{
     *   reply?: Reply|null,
     *   type?: value-of<Type>|null,
     * }> $buttons
     */
    public function withButtons(array $buttons): self
    {
        $self = clone $this;
        $self['buttons'] = $buttons;

        return $self;
    }

    /**
     * @param list<Card|array{
     *   action?: Card\Action|null,
     *   body?: Body|null,
     *   cardIndex?: int|null,
     *   header?: Header|null,
     *   type?: value-of<Card\Type>|null,
     * }> $cards
     */
    public function withCards(array $cards): self
    {
        $self = clone $this;
        $self['cards'] = $cards;

        return $self;
    }

    public function withCatalogID(string $catalogID): self
    {
        $self = clone $this;
        $self['catalogID'] = $catalogID;

        return $self;
    }

    public function withMode(string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param Parameters|array{
     *   displayText?: string|null, url?: string|null
     * } $parameters
     */
    public function withParameters(Parameters|array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }

    public function withProductRetailerID(string $productRetailerID): self
    {
        $self = clone $this;
        $self['productRetailerID'] = $productRetailerID;

        return $self;
    }

    /**
     * @param list<Section|array{
     *   productItems?: list<ProductItem>|null,
     *   rows?: list<Row>|null,
     *   title?: string|null,
     * }> $sections
     */
    public function withSections(array $sections): self
    {
        $self = clone $this;
        $self['sections'] = $sections;

        return $self;
    }
}
