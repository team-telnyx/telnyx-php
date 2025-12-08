<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentListParams\Filter\CreatedAt;
use Telnyx\Documents\DocumentListParams\Filter\CustomerReference;
use Telnyx\Documents\DocumentListParams\Filter\Filename;

/**
 * Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt].
 *
 * @phpstan-type FilterShape = array{
 *   created_at?: CreatedAt|null,
 *   customer_reference?: CustomerReference|null,
 *   filename?: Filename|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional]
    public ?CreatedAt $created_at;

    #[Optional]
    public ?CustomerReference $customer_reference;

    #[Optional]
    public ?Filename $filename;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null, lt?: \DateTimeInterface|null
     * } $created_at
     * @param CustomerReference|array{
     *   eq?: string|null, in?: list<string>|null
     * } $customer_reference
     * @param Filename|array{contains?: string|null} $filename
     */
    public static function with(
        CreatedAt|array|null $created_at = null,
        CustomerReference|array|null $customer_reference = null,
        Filename|array|null $filename = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $filename && $obj['filename'] = $filename;

        return $obj;
    }

    /**
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null, lt?: \DateTimeInterface|null
     * } $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * @param CustomerReference|array{
     *   eq?: string|null, in?: list<string>|null
     * } $customerReference
     */
    public function withCustomerReference(
        CustomerReference|array $customerReference
    ): self {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * @param Filename|array{contains?: string|null} $filename
     */
    public function withFilename(Filename|array $filename): self
    {
        $obj = clone $this;
        $obj['filename'] = $filename;

        return $obj;
    }
}
