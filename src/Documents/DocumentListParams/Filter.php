<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams;

use Telnyx\Core\Attributes\Api;
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

    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    #[Api(optional: true)]
    public ?CustomerReference $customer_reference;

    #[Api(optional: true)]
    public ?Filename $filename;

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
        ?CreatedAt $created_at = null,
        ?CustomerReference $customer_reference = null,
        ?Filename $filename = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj->created_at = $created_at;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $filename && $obj->filename = $filename;

        return $obj;
    }

    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    public function withCustomerReference(
        CustomerReference $customerReference
    ): self {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    public function withFilename(Filename $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }
}
