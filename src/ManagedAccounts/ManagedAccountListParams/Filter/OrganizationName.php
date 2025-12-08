<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OrganizationNameShape = array{
 *   contains?: string|null, eq?: string|null
 * }
 */
final class OrganizationName implements BaseModel
{
    /** @use SdkModel<OrganizationNameShape> */
    use SdkModel;

    /**
     * If present, only returns results with the <code>organization_name</code> containing the given value. Matching is not case-sensitive. Requires at least three characters.
     */
    #[Optional]
    public ?string $contains;

    /**
     * If present, only returns results with the <code>organization_name</code> matching exactly the value given.
     */
    #[Optional]
    public ?string $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $contains = null,
        ?string $eq = null
    ): self {
        $obj = new self;

        null !== $contains && $obj['contains'] = $contains;
        null !== $eq && $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * If present, only returns results with the <code>organization_name</code> containing the given value. Matching is not case-sensitive. Requires at least three characters.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj['contains'] = $contains;

        return $obj;
    }

    /**
     * If present, only returns results with the <code>organization_name</code> matching exactly the value given.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }
}
