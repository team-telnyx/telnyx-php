<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomerReferenceShape = array{
 *   eq?: string|null, in?: list<string>|null
 * }
 */
final class CustomerReference implements BaseModel
{
    /** @use SdkModel<CustomerReferenceShape> */
    use SdkModel;

    /**
     * Filter documents by a customer reference.
     */
    #[Optional]
    public ?string $eq;

    /**
     * Filter documents by a list of customer references.
     *
     * @var list<string>|null $in
     */
    #[Optional(list: 'string')]
    public ?array $in;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $in
     */
    public static function with(?string $eq = null, ?array $in = null): self
    {
        $obj = new self;

        null !== $eq && $obj['eq'] = $eq;
        null !== $in && $obj['in'] = $in;

        return $obj;
    }

    /**
     * Filter documents by a customer reference.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * Filter documents by a list of customer references.
     *
     * @param list<string> $in
     */
    public function withIn(array $in): self
    {
        $obj = clone $this;
        $obj['in'] = $in;

        return $obj;
    }
}
