<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Number10dlcGetResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * @phpstan-type EnumPaginatedResponseShape = array{
 *   page: int, records: list<array<string,mixed>>, totalRecords: int
 * }
 */
final class EnumPaginatedResponse implements BaseModel
{
    /** @use SdkModel<EnumPaginatedResponseShape> */
    use SdkModel;

    #[Required]
    public int $page;

    /** @var list<array<string,mixed>> $records */
    #[Required(list: new MapOf('mixed'))]
    public array $records;

    #[Required]
    public int $totalRecords;

    /**
     * `new EnumPaginatedResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EnumPaginatedResponse::with(page: ..., records: ..., totalRecords: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EnumPaginatedResponse)
     *   ->withPage(...)
     *   ->withRecords(...)
     *   ->withTotalRecords(...)
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
     * @param list<array<string,mixed>> $records
     */
    public static function with(
        int $page,
        array $records,
        int $totalRecords
    ): self {
        $self = new self;

        $self['page'] = $page;
        $self['records'] = $records;
        $self['totalRecords'] = $totalRecords;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $records
     */
    public function withRecords(array $records): self
    {
        $self = clone $this;
        $self['records'] = $records;

        return $self;
    }

    public function withTotalRecords(int $totalRecords): self
    {
        $self = clone $this;
        $self['totalRecords'] = $totalRecords;

        return $self;
    }
}
