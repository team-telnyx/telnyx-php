<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand\BrandGetFeedbackResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CategoryShape = array{
 *   id: string, description: string, displayName: string, fields: list<string>
 * }
 */
final class Category implements BaseModel
{
    /** @use SdkModel<CategoryShape> */
    use SdkModel;

    /**
     * One of `TAX_ID`, `STOCK_SYMBOL`, `GOVERNMENT_ENTITY`, `NONPROFIT`, and `OTHERS`.
     */
    #[Required]
    public string $id;

    /**
     * Long-form description of the feedback with additional information.
     */
    #[Required]
    public string $description;

    /**
     * Human-readable version of the `id` field.
     */
    #[Required]
    public string $displayName;

    /**
     * List of relevant fields in the originally-submitted brand json.
     *
     * @var list<string> $fields
     */
    #[Required(list: 'string')]
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
        $self = new self;

        $self['id'] = $id;
        $self['description'] = $description;
        $self['displayName'] = $displayName;
        $self['fields'] = $fields;

        return $self;
    }

    /**
     * One of `TAX_ID`, `STOCK_SYMBOL`, `GOVERNMENT_ENTITY`, `NONPROFIT`, and `OTHERS`.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Long-form description of the feedback with additional information.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Human-readable version of the `id` field.
     */
    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * List of relevant fields in the originally-submitted brand json.
     *
     * @param list<string> $fields
     */
    public function withFields(array $fields): self
    {
        $self = clone $this;
        $self['fields'] = $fields;

        return $self;
    }
}
