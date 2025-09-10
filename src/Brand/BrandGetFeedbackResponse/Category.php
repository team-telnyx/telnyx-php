<?php

declare(strict_types=1);

namespace Telnyx\Brand\BrandGetFeedbackResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type category_alias = array{
 *   id: string, description: string, displayName: string, fields: list<string>
 * }
 */
final class Category implements BaseModel
{
    /** @use SdkModel<category_alias> */
    use SdkModel;

    /**
     * One of `TAX_ID`, `STOCK_SYMBOL`, `GOVERNMENT_ENTITY`, `NONPROFIT`, and `OTHERS`.
     */
    #[Api]
    public string $id;

    /**
     * Long-form description of the feedback with additional information.
     */
    #[Api]
    public string $description;

    /**
     * Human-readable version of the `id` field.
     */
    #[Api]
    public string $displayName;

    /**
     * List of relevant fields in the originally-submitted brand json.
     *
     * @var list<string> $fields
     */
    #[Api(list: 'string')]
    public array $fields;

    /**
     * `new Category()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Category::with(id: ..., description: ..., displayName: ..., fields: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Category)
     *   ->withID(...)
     *   ->withDescription(...)
     *   ->withDisplayName(...)
     *   ->withFields(...)
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
     * @param list<string> $fields
     */
    public static function with(
        string $id,
        string $description,
        string $displayName,
        array $fields
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->description = $description;
        $obj->displayName = $displayName;
        $obj->fields = $fields;

        return $obj;
    }

    /**
     * One of `TAX_ID`, `STOCK_SYMBOL`, `GOVERNMENT_ENTITY`, `NONPROFIT`, and `OTHERS`.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Long-form description of the feedback with additional information.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Human-readable version of the `id` field.
     */
    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj->displayName = $displayName;

        return $obj;
    }

    /**
     * List of relevant fields in the originally-submitted brand json.
     *
     * @param list<string> $fields
     */
    public function withFields(array $fields): self
    {
        $obj = clone $this;
        $obj->fields = $fields;

        return $obj;
    }
}
