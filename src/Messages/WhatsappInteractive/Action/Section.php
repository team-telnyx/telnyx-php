<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappInteractive\Action;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\WhatsappInteractive\Action\Section\ProductItem;
use Telnyx\Messages\WhatsappInteractive\Action\Section\Row;

/**
 * @phpstan-import-type ProductItemShape from \Telnyx\Messages\WhatsappInteractive\Action\Section\ProductItem
 * @phpstan-import-type RowShape from \Telnyx\Messages\WhatsappInteractive\Action\Section\Row
 *
 * @phpstan-type SectionShape = array{
 *   productItems?: list<ProductItem|ProductItemShape>|null,
 *   rows?: list<Row|RowShape>|null,
 *   title?: string|null,
 * }
 */
final class Section implements BaseModel
{
    /** @use SdkModel<SectionShape> */
    use SdkModel;

    /** @var list<ProductItem>|null $productItems */
    #[Optional('product_items', list: ProductItem::class)]
    public ?array $productItems;

    /** @var list<Row>|null $rows */
    #[Optional(list: Row::class)]
    public ?array $rows;

    /**
     * section title, 24 character maximum.
     */
    #[Optional]
    public ?string $title;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ProductItem|ProductItemShape>|null $productItems
     * @param list<Row|RowShape>|null $rows
     */
    public static function with(
        ?array $productItems = null,
        ?array $rows = null,
        ?string $title = null
    ): self {
        $self = new self;

        null !== $productItems && $self['productItems'] = $productItems;
        null !== $rows && $self['rows'] = $rows;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * @param list<ProductItem|ProductItemShape> $productItems
     */
    public function withProductItems(array $productItems): self
    {
        $self = clone $this;
        $self['productItems'] = $productItems;

        return $self;
    }

    /**
     * @param list<Row|RowShape> $rows
     */
    public function withRows(array $rows): self
    {
        $self = clone $this;
        $self['rows'] = $rows;

        return $self;
    }

    /**
     * section title, 24 character maximum.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
