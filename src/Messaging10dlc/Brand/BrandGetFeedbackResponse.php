<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging10dlc\Brand\BrandGetFeedbackResponse\Category;

/**
 * @phpstan-import-type CategoryShape from \Telnyx\Messaging10dlc\Brand\BrandGetFeedbackResponse\Category
 *
 * @phpstan-type BrandGetFeedbackResponseShape = array{
 *   brandID: string, category: list<Category|CategoryShape>
 * }
 */
final class BrandGetFeedbackResponse implements BaseModel
{
    /** @use SdkModel<BrandGetFeedbackResponseShape> */
    use SdkModel;

    /**
     * ID of the brand being queried about.
     */
    #[Required('brandId')]
    public string $brandID;

    /**
     * A list of reasons why brand creation/revetting didn't go as planned.
     *
     * @var list<Category> $category
     */
    #[Required(list: Category::class)]
    public array $category;

    /**
     * `new BrandGetFeedbackResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandGetFeedbackResponse::with(brandID: ..., category: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandGetFeedbackResponse)->withBrandID(...)->withCategory(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Category|CategoryShape> $category
     */
    public static function with(string $brandID, array $category): self
    {
        $self = new self;

        $self['brandID'] = $brandID;
        $self['category'] = $category;

        return $self;
    }

    /**
     * ID of the brand being queried about.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * A list of reasons why brand creation/revetting didn't go as planned.
     *
     * @param list<Category|CategoryShape> $category
     */
    public function withCategory(array $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }
}
