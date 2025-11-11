<?php

declare(strict_types=1);

namespace Telnyx\Brand;

use Telnyx\Brand\BrandGetFeedbackResponse\Category;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type BrandGetFeedbackResponseShape = array{
 *   brandId: string, category: list<Category>
 * }
 */
final class BrandGetFeedbackResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BrandGetFeedbackResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * ID of the brand being queried about.
     */
    #[Api]
    public string $brandId;

    /**
     * A list of reasons why brand creation/revetting didn't go as planned.
     *
     * @var list<Category> $category
     */
    #[Api(list: Category::class)]
    public array $category;

    /**
     * `new BrandGetFeedbackResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandGetFeedbackResponse::with(brandId: ..., category: ...)
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
     * @param list<Category> $category
     */
    public static function with(string $brandId, array $category): self
    {
        $obj = new self;

        $obj->brandId = $brandId;
        $obj->category = $category;

        return $obj;
    }

    /**
     * ID of the brand being queried about.
     */
    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj->brandId = $brandID;

        return $obj;
    }

    /**
     * A list of reasons why brand creation/revetting didn't go as planned.
     *
     * @param list<Category> $category
     */
    public function withCategory(array $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }
}
