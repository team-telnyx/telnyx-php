<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type customer_reference = array{eq?: string, in?: list<string>}
 */
final class CustomerReference implements BaseModel
{
    /** @use SdkModel<customer_reference> */
    use SdkModel;

    /**
     * Filter documents by a customer reference.
     */
    #[Api(optional: true)]
    public ?string $eq;

    /**
     * Filter documents by a list of customer references.
     *
     * @var list<string>|null $in
     */
    #[Api(list: 'string', optional: true)]
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

        null !== $eq && $obj->eq = $eq;
        null !== $in && $obj->in = $in;

        return $obj;
    }

    /**
     * Filter documents by a customer reference.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

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
        $obj->in = $in;

        return $obj;
    }
}
